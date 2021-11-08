<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Post;

class PostFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 50; $i++){
            $post = new Post();
            $post->setTitle("Article N-{$i}");
            $post->setSlug("article-{$i}");
            $post->setContent("Contenueaeaeaeaeaeae {$i}");
            $manager->persist($post);
        }

        $manager->flush();
    }
}
