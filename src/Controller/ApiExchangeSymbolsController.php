<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\ExchangerateHostProvider;

class ApiExchangeSymbolsController extends AbstractController
{
    #[Route('/api/exchange/symbols', name: 'app_api_exchange_symbols')]
    public function index(ExchangerateHostProvider $exchange): Response
    {
        // switch providers later
        return $this->json($exchange->getSymbols(), 200);
    }
}
