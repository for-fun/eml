<?php

namespace Maps\MainBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root', array('attributes' => array('class' => 'back_to_homepage')));
        $menu->setChildrenAttribute('class', 'nav navbar-nav');
        $menu->setCurrent('active');
        $menu->addChild('Страницы', array('route' => 'page'));
        $menu->addChild('Группы', array('route' => 'groups'));
        $menu->addChild('Заявки', array('route' => 'groupscomments'));
        $menu->addChild('Пользователи', array('uri' => '#user'));

        return $menu;
    }
}