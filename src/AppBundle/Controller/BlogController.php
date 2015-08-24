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
use Doctrine\Common\Collections\ArrayCollection;
use BlogBundle\Entity\Post;

class BlogController extends Controller{

    /**
     * @Route("/блог_автоинструктора/{page}", name="posts", defaults={"page" = 1}, requirements={
     *     "page": "\d+"
     * })
     */
    public function postsListAction($page)
    {
        $repository = $this->getDoctrine()->getRepository('BlogBundle:Post');
        $posts = new ArrayCollection($repository->findBy(
            array('visible' => 1),
            array('update_at' => 'DESC')
        ));

        $pagination = $this->get('pagination')->setCollection($posts)->setItemsPerPage(Post::POSTS_PER_PAGE);
        $list = $pagination->getItems($page);

        $repository = $this->getDoctrine()->getRepository('AppBundle:MainPage');
        $mainpage = $repository->find('1');

        return $this->render('blog/posts.html.twig', array(
            'posts' => $list,
            'mainpage' => $mainpage,
            'page' => $page,
            'pagesCount' => $pagination->getPagesCount()));
    }
}