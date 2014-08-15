<?php

namespace Maps\GroupsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Maps\PageBundle\Entity\Page;

/**
 * @Route("/groups")
 */
class DefaultController extends Controller
{
    /**
     * Show page entity.
     *
     * @Route("")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return $this->render('MapsGroupsBundle:Default:index.html.twig', array('name' => "dasda"));
    }
}