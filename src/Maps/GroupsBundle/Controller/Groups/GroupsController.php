<?php

namespace Maps\GroupsBundle\Controller\Groups;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Maps\GroupsBundle\Entity\Groups\Groups;
use Maps\GroupsBundle\Form\Groups\GroupsType;

/**
 * Groups\Groups controller.
 *
 * @Route("/groups_groups")
 */
class GroupsController extends Controller
{

    /**
     * Lists all Groups\Groups entities.
     *
     * @Route("/", name="groups_groups")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MapsGroupsBundle:Groups\Groups')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Groups\Groups entity.
     *
     * @Route("/", name="groups_groups_create")
     * @Method("POST")
     * @Template("MapsGroupsBundle:Groups\Groups:new.html.twig")
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

            return $this->redirect($this->generateUrl('groups_groups_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
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
        $form = $this->createForm(new GroupsType(), $entity, array(
            'action' => $this->generateUrl('groups_groups_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Groups\Groups entity.
     *
     * @Route("/new", name="groups_groups_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Groups();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Groups\Groups entity.
     *
     * @Route("/{id}", name="groups_groups_show")
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

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Groups\Groups entity.
     *
     * @Route("/{id}/edit", name="groups_groups_edit")
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
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
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
        $form = $this->createForm(new GroupsType(), $entity, array(
            'action' => $this->generateUrl('groups_groups_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Groups\Groups entity.
     *
     * @Route("/{id}", name="groups_groups_update")
     * @Method("PUT")
     * @Template("MapsGroupsBundle:Groups\Groups:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MapsGroupsBundle:Groups\Groups')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Groups\Groups entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('groups_groups_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Groups\Groups entity.
     *
     * @Route("/{id}", name="groups_groups_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
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

        return $this->redirect($this->generateUrl('groups_groups'));
    }


}
