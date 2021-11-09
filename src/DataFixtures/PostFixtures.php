<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Post;
use App\Entity\Comment;

class PostFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 50; $i ++) {
            $post = new Post();
            $post->setTitle("Article N-{$i}");
            $post->setSlug("article-{$i}");
            $post->setContent("Contenueaeaeaeaeaeae {$i}");
            $manager->persist($post);

            for ($j = 1; $j <= 10; $j ++) {
                $comment = new Comment();
                $comment->setAuthor("Author {$j}");
                $comment->setContent("Comment number {$j}");
                $comment->setPost($post);
                $manager->persist($comment);
            }
        }

        $manager->flush();
    }
}
