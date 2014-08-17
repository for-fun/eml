<?php

namespace Maps\MainBundle\Menu;

use Knp\Menu\ItemInterface;
use Knp\Menu\Matcher\Voter\VoterInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Voter based on the uri
 */
class RequestVoter implements VoterInterface
{
    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param ItemInterface $item
     * @return boolean|null
     */
    public function matchItem(ItemInterface $item)
    {
        $match = $item->getAttribute('match');
        $subject = $this->container->get('request')->getRequestUri();
        preg_match("/$match/i", $subject, $matches, PREG_OFFSET_CAPTURE);
        if (isset($matches[0])) {
            $charNumber = (int)$matches[0][1] + strlen($match);
            $lastString = $subject[$charNumber];
            if ($lastString !== "/") {
                return false;
            }
        }
        if ($matches) {
            return true;
        }
        return null;
    }
}