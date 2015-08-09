<?php

namespace ContactsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ContactsBundle:Default:index.html.twig', array('name' => $name));
    }

    public function getAllContactsAction()
    {
        $repository = $this->getDoctrine()->getRepository('ContactsBundle:Contacts');
        $contacts = $repository->find('1');

        return $this->render('ContactsBundle:Default:side_bar.html.twig', array(
            'contacts' => $contacts
        ));

    }
}
