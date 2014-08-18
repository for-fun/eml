<?php

namespace Maps;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as SymfonyController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class Controller
 * @package Maps
 */
class Controller extends SymfonyController
{

    /**
     * @param mixed $data
     * @param int $status
     *
     * @return Response
     */
    public function json($data, $status = 200)
    {
        $body = json_encode($data, JSON_UNESCAPED_UNICODE);

        return new Response($body, $status, [
            'Content-Type' => 'application/json;charset=utf-8'
        ]);
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEm()
    {
        return $this->container->get('doctrine.orm.default_entity_manager');
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
                    'class' => $class . " deleteBtn",
                ],
            ])
            ->getForm();

    }
}