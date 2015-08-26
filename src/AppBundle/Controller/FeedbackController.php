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
use FeedbackBundle\Entity\FeedbackPost;
use Doctrine\Common\Collections\ArrayCollection as Collection;

class FeedbackController extends Controller{
    /**
     * @Route("/отзывы_автоинструктор/{page}", name="feedback", defaults={"page" = 1}, requirements={
     *     "page": "\d+"
     * })
     */
    public function feedbackListAction($page)
    {
        $repository = $this->getDoctrine()->getRepository('FeedbackBundle:FeedbackPost');
        $feedbackPosts = new Collection($repository->findBy(array('visible' => 1), array('update_at' => 'DESC')));

        $pagination = $this->get('pagination')->setCollection($feedbackPosts)->setItemsPerPage(FeedbackPost::FEEDBACK_POSTS_PER_PAGE);
        $list = $pagination->getItems($page);

        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->addMeta('name', 'keywords', 'автоинструктор обучение вождению экзамен гаи минск отзывы')
            ->addMeta('name', 'description', 'автоинструктор в минске отзывы');

        return $this->render('feedback/feedback.html.twig', array(
            'feedbackPosts' => $list,
            'page' => $page,
            'pagesCount' => $pagination->getPagesCount()
        ));
    }
}