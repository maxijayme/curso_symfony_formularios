<?php

namespace App\Controller;

use App\Form\PostType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/post/create', name: 'postController')]
    public function index(): Response
    {
        $form = $this->createForm(PostType::class);
        return $this->render('post/index.html.twig', [
            'form' => $form
        ]);
    }
}
