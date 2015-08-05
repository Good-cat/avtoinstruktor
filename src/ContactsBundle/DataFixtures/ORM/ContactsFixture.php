<?php
/**
 * Created by PhpStorm.
 * User: itm
 * Date: 05.08.15
 * Time: 18:52
 */

namespace ContactsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ContactsBundle\Entity\Contacts;

class ContactsFixture implements FixtureInterface{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $contacts = new Contacts();
        $contacts->setPhones('555-55-55');
        $contacts->setEmail('test@mail.dev');
        $contacts->setSkype('test_skype');
        $contacts->setAddress('Минск, ул.Горького, д.25');
        $contacts->setInformation('Дополнительная информация');

        $manager->persist($contacts);
        $manager->flush();
    }
} 