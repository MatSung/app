<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'blog_list', methods: ['GET'])]
    public function list(): Response
    {
        return $this->json('lol');
    }

    #[Route('/blog', name: 'blog_create', methods: ['POST'])]
    public function create(): Response
    {
        return $this->json('you have posted');
    }
}