<?php

namespace Maps\PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class PageController extends Controller
{
    /**
     * Show Page entiti.
     *
     * @Route("/{slug}-{id}", requirements={"slug" = "[a-zA-Z|-]+", "id" = "\d+"})
     * @Method("GET")
     * @Template()
     */
    public function showAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entiti = $em->getRepository('MapsPageBundle:Page')->find([
            'id' => 12
        ]);

        if (!$entiti) {
            throw $this->createNotFoundException('The page does not exist');
        }

        return [
            'entiti' => $entiti,
        ];
    }

}