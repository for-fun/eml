<?php

namespace Maps\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DemoController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function topArticlesAction()
    {
        $articles = "";

        return $this->render('MapsPageBundle:Demo:demo.html.twig', array());
    }

    // ...
}