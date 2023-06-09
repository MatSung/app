<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController
{
    // #[Route('/lucky', name: 'app_lucky')]
    // public function index(): Response
    // {
    //     return $this->render('lucky/index.html.twig', [
    //         'controller_name' => 'LuckyController',
    //     ]);
    // }

    #[Route('lucky/number', name: 'app_lucky_number')]
    public function number(): Response
    {
        $number = random_int(0,100);

        return $this->render('lucky/index.html.twig', [
            'number' => $number,
            'controller_name' => get_class($this)
        ]);
    }
}
