<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 23.08.15
 * Time: 12:35
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FeedbackController extends Controller{
    /**
     * @Route("/отзывы_автоинструктор", name="feedback")
     */
    public function feedbackListAction()
    {
        $repository = $this->getDoctrine()->getRepository('FeedbackBundle:FeedbackPost');
        $feedbackPosts = $repository->findBy(array('visible' => 1));
        return $this->render('feedback/feedback.html.twig', array('feedbackPosts' => $feedbackPosts));
    }
}