<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 23.08.15
 * Time: 12:32
 */

namespace FeedbackBundle\Controller;

use FeedbackBundle\Form\Type\FeedbackType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FeedbackBundle\Entity\FeedbackPost;

class FeedbackController extends Controller{
    const FEEDBACK_SUCCESS = "Отзыв успешно отправлен и в ближайшее время будет размещен на сайте. Спасибо за Ваше мнение о нас!";
    const FEEDBACK_ERROR_NOROBOT = "Подтвердите, что Вы не робот!";
    const FEEDBACK_ERROR_MESSAGE = "Вы забыли оставить сообщение!";

    public function getFeedbackFormAction()
    {
        $feedbackForm = $this->createForm(new FeedbackType());
        return $this->render('FeedbackBundle::_feedback.html.twig', array(
            'feedbackForm' => $feedbackForm->createView(),
            'success' => self::FEEDBACK_SUCCESS,
            'error_norobot' => self::FEEDBACK_ERROR_NOROBOT,
            'error_message' => self::FEEDBACK_ERROR_MESSAGE
        ));
    }

    public function sendFeedbackAction(Request $request)
    {
        if ($request->isXmlHttpRequest()) {
            $feedbackForm = $this->createForm(new FeedbackType());
            $feedbackForm->handleRequest($request);
            if ($feedbackForm->isValid()){
                $name = $feedbackForm->get('name')->getData() ? : "Анонимный пользователь" . time();
                if (!$feedbackForm->get('message')->getData()) {
                    return new Response(self::FEEDBACK_ERROR_MESSAGE);
                } else {
                    $message = $feedbackForm->get('message')->getData();
                    $feedbackPost = new FeedbackPost();
                    $feedbackPost->setAuthor($name);
                    $feedbackPost->setText(strip_tags($message));
                    $feedbackPost->setUpdateAt(new \DateTime());
                    $feedbackPost->setSlug();
                    $feedbackPost->setVisible(false);

                    $em = $this->getDoctrine()->getManager();
                    $em->persist($feedbackPost);
                    $em->flush();
                    return new Response(self::FEEDBACK_SUCCESS);
                }
            } else {
                return new Response(self::FEEDBACK_ERROR_NOROBOT);
            }

        }
    }
}