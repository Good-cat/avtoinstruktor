<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 16.08.15
 * Time: 17:47
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ServiceController extends Controller{
    /**
     * @Route("/услуги_автоинструктора", name="services")
     */
    public function servicesAction()
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Service');
        $services = $repository->findBy(array('visible' => 1));

        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->addMeta('name', 'keywords', 'автоинструктор обучение вождению экзамен гаи минск услуги цены стоимость')
            ->addMeta('name', 'description', 'услуги автоинструктора в минске');

        return $this->render('service/services.html.twig', array('services' => $services));
    }
}