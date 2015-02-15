<?php

namespace Webdev\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Component\HttpFoundation\Session\Session;
use Webdev\BlogBundle\Entity\Post;

class PostController extends Controller
{
    /**
     * @Route("/post/{slug}", name="blog_post_view")
     * @Template()
     */
    public function viewAction($slug)
    {
        $entityManager = $this->getDoctrine()->getManager();
        /**
         * @var Post $post
         */
        $post = $entityManager->getRepository('WebdevBlogBundle:Post')->findOneBySlug($slug);
        if (!$post) {
            throw $this->createNotFoundException("Blogpost {$slug} wurde nicht gefunden");
        }


        /** @var Session $session */
        $session = $this->get("session");
        $visited_posts = $session->get('visited_posts', array());
        if (!in_array($slug, $visited_posts)) {
            $post->setClicks($post->getClicks() + 1);
            $entityManager->flush();

            $visited_posts[] = $slug;
            $session->set('visited_posts', $visited_posts);
        }

        return array('post' => $post);
    }
}
