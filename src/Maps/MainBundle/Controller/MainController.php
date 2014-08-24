<?php

namespace Maps\MainBundle\Controller;

use Maps\Controller;
use Maps\GroupsBundle\Entity\Groups\Groups;
use Maps\GroupsBundle\Form\Groups\GroupsType;
use Maps\SearchBundle\Entity\Search;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class MainController extends Controller
{

    /**
     * @Route("/", name="site_home")
     * @Template()
     * @return array
     */
    public function homeAction()
    {
        return [
            'pageTitle' => "Главная страница",
            'seoDescription' => "ЕДИНОМЫШЛЕННИКИ РУ - Социальная сеть",
            'seoKeywords' => "единомышленники, ищу единомышленников, инициативная группа, меценат, инвестор, единомышленники ру, социальная сеть единомышленники",
        ];
    }

    /**
     * @Route("/search/", name="site_search")
     * @Template()
     * @param Request $request
     * @return array
     */
    public function searchAction(Request $request)
    {
        $entity = new Groups();
        $form = $this->createGroupCreateForm($entity);
        $searchQuery = $request->query->get('text');

        if ($searchQuery !== null) {
            $search = new Search();
            $search->setName($searchQuery);
            $em = $this->getEm();
            $em->persist($search);
            $em->flush();
        }

        return [
            'entity' => $entity,
            'form' => $form->createView(),
            'pageTitle' => 'Поиск',
        ];
    }

    /**
     * Creates a form to create a Groups\Groups entity.
     *
     * @param Groups $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createGroupCreateForm(Groups $entity)
    {
        $form = $this->createForm(new GroupsType(), $entity, [
            'action' => $this->generateUrl('site_groups_create'),
            'method' => 'POST',
        ]);
        $form->remove("allowed");
        $form->add('captcha', 'captcha', [
            'label' => 'Введите код: *',
            'attr' => [
                'style' => 'margin-top: 10px; width: 220px;'
            ],
        ]);

        $form->add('submit', 'submit', ['label' => 'Добавить группу']);

        return $form;
    }

    /**
     * @param $id
     * @param $url
     * @param string $class
     * @param string $title
     * @return \Symfony\Component\HttpFoundation\Response
     * @Template()
     */
    public function deleteFormAction($id, $url, $class = 'btn-danger', $title = 'Удалить')
    {
        $form = $this->createDeleteForm($id, $url, $class, $title);

        return [
            'delete_form' => $form->createView(),
        ];
    }

    /**
     * @param $id
     * @param $url
     * @param string $class
     * @param string $title
     * @return \Symfony\Component\Form\Form
     */
    public function createDeleteForm($id, $url, $class = 'btn-danger', $title = 'Удалить')
    {
        return $this->createFormBuilder([], [
                'attr' => [
                    'class' => 'inline-block deleteForm',
                ]
            ]
        )
            ->setAction($this->generateUrl($url, ['id' => $id]))
            ->setMethod('DELETE')
            ->add('submit', 'submit', [
                'label' => $title,
                'attr' => [
                    'class' => $class . " deleteBtn btn-sm",
                ],
            ])
            ->getForm();
    }

}
