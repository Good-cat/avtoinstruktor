<?php

namespace SliderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('SliderBundle:Slider');
        $items = $repository->findAll();

        return $this->render('SliderBundle:Default:index.html.twig', array('items' => $items));
    }
}
