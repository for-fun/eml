<?php

namespace Maps\GroupsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Maps\GroupsBundle\Entity\Groups\Groups;
use Maps\PageBundle\Entity\Page;
use Maps\UserBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData implements FixtureInterface, ContainerAwareInterface
{
    public function load(ObjectManager $manager)
    {
        $this->group($manager);
        $this->user($manager);
        $this->page($manager);
    }

    public function page(ObjectManager $manager)
    {
        $page = new Page();
        $page->setName("Главная страница");
        $page->setSlug("/");
        $page->setText("");
        $manager->persist($page);

        unset($page);
        $page = new Page();
        $page->setName("О нас");
        $page->setSlug("info");
        $page->setText("О нас О нас О нас О нас");

        $manager->persist($page);
        $manager->flush();
    }

    public function group(ObjectManager $manager)
    {
        $arr = [
            ['Создание парка в Москве'],
            ['Озеленение планеты Марс'],
            ['Полезное общение'],
            ['Секс'],
            ['Железная дорога в город Каргополь'],
            ['Путешествия для обучения'],
            ['Свобода'],
            ['Ом Терра Нова'],
            ['Горные лыжи'],
            ['Саморазвитие'],
            ['Искусство жить свободно,познавать себя'],
            ['Друзья'],
            ['Веганы и вегетарианцы'],
            ['Проектирование космических кораблей'],
            ['Стартап!'],
            ['Торговля'],
            ['Ищу работу (Москва)'],
            ['Охотники'],
            ['Семейная Школа Амигэ'],
            ['Экологический транспорт'],
            ['Анорексички'],
            ['Технология "ВВ"'],
            ['Отказ от польских и латвийских продуктов'],
            ['Производство'],
        ];

        foreach ($arr as $item) {
            $group = new Groups();
            $group->setName($item[0]);
            $group->setText("Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid cumque ducimus maiores minus modi nostrum ratione rem repudiandae vel vero!");
            $group->setAuthorName("AuthorName Test");
            $group->setAuthorContact("AuthorContact Test");
            $group->setIp("214.227.51.78");
            $group->setAllowed(true);

            $manager->persist($group);
            $manager->flush();
            unset($group);
        }
    }

    public function user(ObjectManager $manager)
    {
        $vld = new User();
        $vld->setUsername("vld");
        $vld->setEmail("dev@vld.me");
        $vld->setPlainPassword("123");
        $vld->setEnabled(true);
        $vld->setRoles(['ROLE_ADMIN']);

        $alex = new User();
        $alex->setUsername("alex");
        $alex->setEmail("alex@alex.me");
        $alex->setPlainPassword("123");
        $alex->setEnabled(true);
        $alex->setRoles(['ROLE_ADMIN']);

        $manager->persist($vld);
        $manager->persist($alex);
        $manager->flush();
    }

    /**
     * Sets the Container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     *
     * @api
     */
    public function setContainer(ContainerInterface $container = null)
    {
        // TODO: Implement setContainer() method.
    }
}