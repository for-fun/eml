<?php

namespace Maps;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as SymfonyController;

/**
 * Class Controller
 * @package Maps
 */
class Controller extends SymfonyController
{
    /**
     * @param $id
     * @param bool $title
     * @param bool $class
     * @return \Symfony\Component\Form\Form
     */
    public function myCreateDeleteForm($id, $title = false, $class = false)
    {
        return $this->createFormBuilder(array(), array(
                'attr' => array(
                    'class' => 'inline-block deleteForm',
                )
            )
        )
            ->setAction($this->generateUrl('page_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array(
                'label' => $title,
                'attr' => array(
                    'class' => $class . " deleteBtn",
                ),
            ))
            ->getForm();
    }
}