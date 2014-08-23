<?php

namespace Maps\SearchBundle\Controller\Admin;

use Maps\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Maps\SearchBundle\Entity\Search;


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
        $search = new Search();
        $search->setName("test name");

        $em = $this->getEm();
        $em->persist($search);
        $em->flush();

        return [
            'test' => '11111111111'
        ];
    }
}
