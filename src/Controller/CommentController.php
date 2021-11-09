<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Comment;

class CommentController extends AbstractController
{
    #[Route('/comment', name: 'comment')]
    public function index(): Response
    {
        $comments = $this->getDoctrine()->getRepository(Comment::class)->findAll();
        return $this->render('comment/index.html.twig', [
            'comments' => $comments,
        ]);
    }
}
