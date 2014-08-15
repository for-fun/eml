<?php

namespace Maps\PageBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Maps\PageBundle\Entity\Page;


class PageController extends Controller
{
    /**
     * Show page entity.
     *
     * @Route("/", defaults={"slug" = "/"})
     * @Route("/{slug}-{id}", requirements={"slug" = "[a-zA-Z|-]+", "id" = "\d+"})
     * @ParamConverter("page", options={"id" = "id"})
     * @Method("GET")
     * @Template()
     */
    public function showAction(Page $page)
    {
        $request = $this->container->get('request');
        $id = $request->get('id');
        $slug = $request->get('slug');
        $pageUrl = $page->getSlug();
        if ($pageUrl === "/" and isset($id)) {
            $generateUrl = $this->generateUrl('maps_page_page_show', ['slug' => '/']);
            return $this->redirect($generateUrl, 301);
        }
        if ($pageUrl !== $slug) {
            $generateUrl = $this->generateUrl('maps_page_page_show', ['slug' => $pageUrl, 'id' => $id]);
            return $this->redirect($generateUrl, 301);
        }

        return [
            'page' => $page,
        ];
    }

}