<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:MainPage');
        $mainpage = $repository->find('1');

        $seoPage = $this->container->get('sonata.seo.page');

        $seoPage
            ->addMeta('name', 'keywords', 'автоинструктор обучение вождению экзамен гаи минск')
            ->addMeta('name', 'description', $mainpage->getTitle());

        return $this->render('default/index.html.twig', array('mainpage' => $mainpage));
    }
}
