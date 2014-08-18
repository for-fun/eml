<?php

namespace Maps\GroupsBundle\Controller\Admin;

use Maps\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Maps\GroupsBundle\Entity\Groups\Groups;
use Maps\GroupsBundle\Form\Groups\GroupsType;

/**
 * Groups\Groups controller.
 *
 * @Route("/admin/groups")
 */
class GroupsController extends Controller
{

    /**
     * Lists all Groups\Groups entities.
     *
     * @Route("/", name="groups")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MapsGroupsBundle:Groups\Groups')->findAll();

        return [
            'entities' => $entities,
        ];
    }

    /**
     * Creates a new Groups\Groups entity.
     *
     * @Route("/", name="groups_create")
     * @Method("POST")
     * @Template("MapsGroupsBundle:Admin/Groups:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Groups();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('groups_show', ['id' => $entity->getId()]));
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
            'action' => $this->generateUrl('groups_create'),
            'method' => 'POST',
        ]);

        $form->add('submit', 'submit', ['label' => 'Создать']);

        return $form;
    }

    /**
     * Displays a form to create a new Groups\Groups entity.
     *
     * @Route("/new", name="groups_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Groups();
        $form = $this->createCreateForm($entity);

        return [
            'entity' => $entity,
            'form' => $form->createView(),
        ];
    }

    /**
     * Displays a form to edit an existing Groups\Groups entity.
     *
     * @Route("/{id}/edit", name="groups_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MapsGroupsBundle:Groups\Groups')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Groups\Groups entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id, 'groups_delete');

        return [
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ];
    }

    /**
     * Creates a form to edit a Groups\Groups entity.
     *
     * @param Groups $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Groups $entity)
    {
        $form = $this->createForm(new GroupsType(), $entity, [
            'action' => $this->generateUrl('groups_update', ['id' => $entity->getId()]),
            'method' => 'PUT',
        ]);

        $form->add('submit', 'submit', ['label' => 'Изменить']);

        return $form;
    }

    /**
     * Edits an existing Groups\Groups entity.
     *
     * @Route("/{id}", name="groups_update")
     * @Method("PUT")
     * @Template("MapsGroupsBundle:Admin/Groups:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MapsGroupsBundle:Groups\Groups')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Groups\Groups entity.');
        }

        $deleteForm = $this->createDeleteForm($id, 'groups_delete');
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('groups_edit', ['id' => $id]));
        }

        return [
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ];
    }

    /**
     * Finds and displays a Groups\Groups entity.
     *
     * @Route("/{id}", name="groups_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MapsGroupsBundle:Groups\Groups')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Groups\Groups entity.');
        }

        return [
            'entity' => $entity,
        ];
    }

    /**
     * Deletes a Groups\Groups entity.
     *
     * @Route("/{id}", name="groups_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id, 'groups_delete');
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MapsGroupsBundle:Groups\Groups')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Groups\Groups entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('groups'));
    }
}
