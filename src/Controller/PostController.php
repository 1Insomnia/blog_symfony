<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Post;

class PostController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $posts = $this->getDoctrine()->getRepository(Post::class)->findAll();
        return $this->render('home/index.html.twig', [
            "posts" => $posts
        ]);
    }

    #[Route('/article-{slug}', name: 'post_read')]
    public function read(Post $post): Response
    {
        return $this->render('blog/read.html.twig', [
            "post" => $post
        ]);
    }
}
