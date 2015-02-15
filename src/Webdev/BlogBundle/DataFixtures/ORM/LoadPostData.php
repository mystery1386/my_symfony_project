<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 08.02.15
 * Time: 13:37
 */

namespace Webdev\BlogBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Webdev\BlogBundle\Entity\Post;

class LoadPostData implements \Doctrine\Common\DataFixtures\FixtureInterface{

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager) {
        $post = new Post();
        $post->setTitle("sympfony2 Tutorial");
        $post->setSlug("sympfony2-tutorial");
        $post->setContent("<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p><p> Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>");

        $manager->persist($post);
        $manager->flush();
    }
}