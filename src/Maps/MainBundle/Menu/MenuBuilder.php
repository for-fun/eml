<?php

namespace Maps\MainBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class MenuBuilder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory)
    {
        $menu = $factory->createItem('root', array('attributes' => array('class' => 'back_to_homepage')));
        $menu->setChildrenAttribute('class', 'nav navbar-nav');
        $menu->setCurrent('active');
        $menu->addChild('Страницы', array('route' => 'page'))->setAttribute('match', 'page');
        $menu->addChild('Группы', array('route' => 'groups'))->setAttribute('match', 'groups');
        $menu->addChild('Заявки', array('route' => 'groupscomments'))->setAttribute('match', 'groups_comments');
        $menu->addChild('Пользователи', array('uri' => '#user'))->setAttribute('match', 'user');

        return $menu;
    }
}