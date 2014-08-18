<?php

namespace Maps\MainBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
        ];
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
