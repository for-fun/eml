<?php

namespace Maps\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Maps\PageBundle\Entity\Page;


class PageController extends Controller
{
    /**
     * Show page entity.
     *
     * @Route("/", defaults={"slug" = "/"})
     * @Route("/{slug}", requirements={"slug" = "[a-zA-Z-]+"})
     * @Method("GET")
     * @Template()
     */
    public function showAction(Page $page)
    {
        return [
            'page' => $page,
            'pageTitle' => $page->getName(),
            'seoTitle' => $page->getSeoTitle(),
            'seoKeywords' => $page->getSeoKeywords(),
            'seoDescription' => $page->getSeoDescription(),
        ];
    }
}