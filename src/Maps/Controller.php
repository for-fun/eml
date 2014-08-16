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
}