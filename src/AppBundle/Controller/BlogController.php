<?php
/**
 * Created by PhpStorm.
 * User: misha
 * Date: 22.08.15
 * Time: 23:18
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller{

    /**
     * @Route("/блог_автоинструктора", name="posts")
     */
    public function postsListAction()
    {
        $repository = $this->getDoctrine()->getRepository('BlogBundle:Post');
        $posts = $repository->findBy(array('visible' => 1));

        return $this->render('blog/posts.html.twig', array('posts' => $posts));
    }
}