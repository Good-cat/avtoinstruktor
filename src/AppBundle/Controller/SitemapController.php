<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\Common\Collections\ArrayCollection;

class SitemapController extends Controller{
    /**
     * @Route("/sitemap.{_format}", name="sitemap", Requirements={"_format" = "xml"})
     */
    public function sitemapAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $urls = array();
        $hostname = $this->get('request')->getHost();
        $scheme = $this->get('request')->getScheme();

        $urls[] = array(
            'loc' => $this->get('router')->generate('homepage'),
            'changefreq' => 'weekly',
            'priority' => '1.0');

        $repository = $this->getDoctrine()->getRepository('BlogBundle:Post');
        $posts = new ArrayCollection($repository->findBy(
            array('visible' => 1),
            array('update_at' => 'DESC')
        ));

        $urls[] = array(
            'loc' => $this->get('router')->generate('posts'),
            'changefreq' => 'weekly',
            'lastmod' => $posts->first()->getUpdateAt(),
            'priority' => '1.0');

        $repository = $this->getDoctrine()->getRepository('FeedbackBundle:FeedbackPost');
        $feedbackPosts = new ArrayCollection($repository->findBy(
            array('visible' => 1),
            array('update_at' => 'DESC')
        ));

        $repository = $this->getDoctrine()->getRepository('FeedbackBundle:FeedbackComment');
        $feedbackComments = new ArrayCollection($repository->findBy(
            array('visible' => 1),
            array('update_at' => 'DESC')
        ));

        $urls[] = array(
            'loc' => $this->get('router')->generate('feedback'),
            'changefreq' => 'weekly',
            'lastmod' => $feedbackPosts->first()->getUpdateAt() > $feedbackComments->first()->getUpdateAt() ? $feedbackPosts->first()->getUpdateAt() : $feedbackComments->first()->getUpdateAt(),
            'priority' => '1.0');

        $urls[] = array(
            'loc' => $this->get('router')->generate('services'),
            'changefreq' => 'weekly',
            'priority' => '1.0');

        return $this->render('sitemap/index.xml.twig', array(
            'urls' => $urls,
            'hostname' => $hostname,
            'scheme' => $scheme
            ));
    }
} 