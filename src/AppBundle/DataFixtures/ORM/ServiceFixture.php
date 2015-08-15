<?php
/**
 * Created by PhpStorm.
 * User: itm
 * Date: 15.08.15
 * Time: 17:38
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Service;

class ServiceFixture implements  FixtureInterface {
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $service = new Service();
        $service->setName('Услуга по умолчанию');
        $service->setAnnotation('Краткое описание услуги');
        $service->setDescription('Подробное описание услуги');


        $manager->persist($service);
        $manager->flush();
    }
} 