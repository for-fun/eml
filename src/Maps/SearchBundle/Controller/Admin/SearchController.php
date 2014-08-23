<?php

namespace Maps\SearchBundle\Controller\Admin;

use Maps\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


/**
 * Groups\Groups controller.
 *
 * @Route("/admin/search")
 */
class SearchController extends Controller
{
    /**
     * Show Groups.
     *
     * @Route("/", name="search")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('MapsSearchBundle:Search')->findBy([], [
            'id' => 'DESC'
        ]);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $entities,
            $this->get('request')->query->get('page', 1),
            30
        );

        return [
            'pagination' => $pagination,
        ];
    }
}
