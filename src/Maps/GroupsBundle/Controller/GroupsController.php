<?php

namespace Maps\GroupsBundle\Controller;

use Maps\Controller;
use Maps\GroupsBundle\Entity\Groups\Groups;
use Maps\GroupsBundle\Entity\GroupsComments;
use Maps\GroupsBundle\Form\Groups\GroupsType;
use Maps\GroupsBundle\Form\GroupsCommentsType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @Route("")
 */
class GroupsController extends Controller
{
    /**
     * Show Groups.
     *
     * @Route("/groups/", name="site_groups")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getEm();
        $groups = $em->getRepository('MapsGroupsBundle:Groups\Groups')->findBy([
            'allowed' => true,
        ], [
            'id' => 'DESC',
        ]);

        $title = "Список инициативных групп";

        return [
            'groups' => $groups,
            'pageTitle' => $title,
            'seoKeywords' => $title,
            'seoDescription' => $title,
        ];
    }

    /**
     * Show Groups entity.
     *
     * @param Groups $group
     * @Route("/groups/{id}", name="site_groups_show")
     * @Method("GET")
     * @Template()
     * @param Request $request
     * @return array
     */
    public function showAction(Groups $group, Request $request)
    {
        $commentsEntity = new GroupsComments();
        $commentsForm = $this->createCommentsCreateForm($commentsEntity, $group->getId());

        if (!$group->getAllowed()) {
            throw new NotFoundHttpException('Группа не найдена');
        }
        return [
            'group' => $group,
            'pageTitle' => $group->getName(),
            'seoKeywords' => $group->getName(),
            'seoDescription' => $group->getName(),
            'commentsForm' => $commentsForm->createView(),
        ];
    }

    /**
     * Creates a new Groups\Groups entity.
     *
     * @Route("/groups/", name="site_groups_create")
     * @Method("POST")
     * @Template("@MapsGroups/Groups/add.html.twig")
     * @param Request $request
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function createAction(Request $request)
    {
        $entity = new Groups();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $message = \Swift_Message::newInstance()
                ->setSubject('Инициативная группа - ' . $entity->getName())
                ->setFrom('mail@ednml.ru')
                ->setTo("ald2006@yandex.ru")
                ->setBody(
                    $this->renderView(
                        'MapsGroupsBundle:Groups:mail.html.twig',
                        [
                            'id' => $entity->getId(),
                            'name' => $entity->getName(),
                        ]
                    ),
                    'text/html'
                );
            $this->get('mailer')->send($message);

            $comment = new GroupsComments();
            $comment->setAuthorName($entity->getName());
            $comment->setAuthorContact($entity->getAuthorContact());
            $comment->setAuthorText($entity->getAuthorInfo());
            $comment->setGroupsId($entity);

            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('notice', 'Ваша группа добавлена, после одобрения модератором она появится в общем списке.');

            return $this->redirect($this->generateUrl('site_groups'));
        }

        return [
            'entity' => $entity,
            'form' => $form->createView(),
        ];
    }


    /**
     * Creates a form to create a Groups\Groups entity.
     *
     * @param Groups $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Groups $entity)
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
     * Add Groups entity.
     *
     * @Route("/groups/add/", name="site_groups_add")
     * @Method("GET")
     * @Template()
     * @return array
     */
    public function addAction()
    {
        $entity = new Groups();
        $form = $this->createCreateForm($entity);

        return [
            'entity' => $entity,
            'form' => $form->createView(),
            'pageTitle' => 'Добавить группу',
        ];
    }

    /**
     * Creates a new GroupsComments entity.
     *
     * @Route("/groups/comments_add/{id}", name="site_comments_create")
     * @Method("POST")
     * @Template("MapsGroupsBundle:Groups:show.html.twig")
     * @param Groups $group
     * @param Request $request
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function commentsCreateAction(Groups $group, Request $request)
    {
        $entity = new GroupsComments();
        $id = (int)$request->get('id');
        $form = $this->createCommentsCreateForm($entity, $id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $entity = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('site_groups_show', ['id' => $id]));
        }

        return [
            'group' => $group,
            'pageTitle' => $group->getName(),
            'seoKeywords' => $group->getName(),
            'seoDescription' => $group->getName(),
            'commentsForm' => $form->createView(),
        ];
    }

    /**
     * Creates a form to create a GroupsComments entity.
     *
     * @param GroupsComments $entity The entity
     *
     * @param $id
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCommentsCreateForm(GroupsComments $entity, $id)
    {
        $form = $this->createForm(new GroupsCommentsType(), $entity, [
            'action' => $this->generateUrl('site_comments_create', ['id' => $id]),
            'method' => 'POST',
        ]);
        $form->add("groupsId", null, [
            'label' => false,
            'attr' => [
                'style' => 'display: none;'
            ],
        ]);
        $form->add('captcha', 'captcha', [
            'label' => 'Введите код: * ',
            'attr' => [
                'style' => 'margin-top: 10px; width: 220px;'
            ],
        ]);
        $form->add('submit', 'submit', ['label' => 'Вступить']);

        return $form;
    }


    /**
     * Show page entity.
     *
     * @Route("/api/groups/", name="api_groups")
     * @Method("GET")
     */
    public function getAllAction()
    {
        $em = $this->getEm();
        $data = $em->getRepository('MapsGroupsBundle:Groups\Groups')->findAll();

        $items = [];
        foreach ($data as $item) {
            $items[] = $item->toArray();
        }

        return $this->json($items);
    }

}