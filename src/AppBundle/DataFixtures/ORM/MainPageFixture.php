<?php
/**
 * Created by PhpStorm.
 * User: itm
 * Date: 05.08.15
 * Time: 18:52
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\MainPage;

class MainPageFixture implements FixtureInterface{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $mainpage = new MainPage();
        $mainpage->setTitle('Название главной станицы');
        $mainpage->setText('Текст страницы');


        $manager->persist($mainpage);
        $manager->flush();
    }
} 