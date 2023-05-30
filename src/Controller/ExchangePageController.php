<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExchangePageController extends AbstractController
{
    #[Route('/exchange', name: 'app_exchange')]
    public function index(): Response
    {
        return $this->render('exchange_page/index.html.twig');
    }
}
