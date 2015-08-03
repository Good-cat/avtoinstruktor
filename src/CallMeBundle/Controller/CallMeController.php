<?php

namespace CallMeBundle\Controller;

use CallMeBundle\Form\Type\CallMeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CallMeController extends Controller{
    public function getCallMeFormAction()
    {
        $callMeForm = $this->createForm(new CallMeType());
        return $this->render('CallMeBundle::_callme.html.twig', array(
            'callMeForm' => $callMeForm->createView()
        ));
    }
} 