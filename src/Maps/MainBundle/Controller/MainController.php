<?php

namespace Maps\MainBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{

    /**
     * @param $id
     * @param $url
     * @param string $class
     * @param string $title
     * @return \Symfony\Component\Form\Form
     */
    public function createDeleteForm($id, $url, $class = 'btn-danger', $title = 'Удалить')
    {
        return $this->createFormBuilder(array(), array(
                'attr' => array(
                    'class' => 'inline-block deleteForm',
                )
            )
        )
            ->setAction($this->generateUrl($url, array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array(
                'label' => $title,
                'attr' => array(
                    'class' => $class . " deleteBtn",
                ),
            ))
            ->getForm();
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
}
