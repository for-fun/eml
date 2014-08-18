<?php

namespace Maps\GroupsBundle\Controller;

use Maps\Controller;
use Maps\GroupsBundle\Entity\Groups\Groups;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("")
 */
class GroupsController extends Controller
{
    /**
     * Show Groups.
     *
     * @Route("/groups/", name="site_groups")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $title = "Список инициативных групп";

        return [
            'pageTitle' => $title,
            'seoKeywords' => $title,
            'seoDescription' => $title,
        ];
    }

    /**
     * Show Groups entity.
     *
     * @param Groups $group
     * @Route("/groups/{id}", name="site_groups_show")
     * @Method("GET")
     * @Template()
     * @return array
     */
    public function showAction(Groups $group)
    {
        if (!$group->getAllowed()) {
            return $this->createNotFoundException('Группа не найдена');
        }

        return [
            'group' => $group,
            'pageTitle' => $group->getName(),
            'seoKeywords' => $group->getName(),
            'seoDescription' => $group->getName(),
        ];
    }


    /**
     * Show page entity.
     *
     * @Route("/api/groups/", name="api_groups")
     * @Method("GET")
     */
    public function getAllAction()
    {
        $em = $this->getEm();
        $data = $em->getRepository('MapsGroupsBundle:Groups\Groups')->findAll();

        $items = [];
        foreach ($data as $item) {
            $items[] = $item->toArray();
        }

        return $this->json($items);
    }

}