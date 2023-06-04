<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\ExchangerateHostProvider;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validation;
use App\Validator\IsValidConversionAmount;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ApiExchangeConvertController extends AbstractController
{
    #[Route('/api/exchange/convert', name: 'app_api_exchange_convert')]
    public function index(
        ExchangerateHostProvider $exchange,
        Request $request
    ): Response {
        // from to and amount from the request
        // validate data here

        $from = $request->query->get('from');
        $to = $request->query->get('to');
        $amount = $request->query->get('amount');
        

        $validator = Validation::createValidator();
        $amountConstraint = new IsValidConversionAmount();

        $errors = $validator->validate(
            $amount,
            $amountConstraint
        );

        if($errors->count()){
            dd($errors);
            throw new BadRequestHttpException('Invalid data provided');
        }

        return $this->json([
            'result' => $exchange->convert($from, $to, (float) $amount),
            'query' => [
                'from' => $from,
                'to' => $to,
                'amount' => $amount
            ]
        ]);
    }
}
