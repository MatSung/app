<?php

namespace App\Service;

use App\Service\ExchangeRateProviderInterface;
use App\Exception\ThirdPartyUnavailableHttpException;
use Symfony\Contracts\HttpClient\HttpClientInterface;


class ExchangerateHostProvider implements ExchangeRateProviderInterface
{

    private string $req_url = 'https://api.exchangerate.host/';

    public function __construct(
        private HttpClientInterface $client,
    ) {
    }

    public function getSymbols(): array
    {
        // next build an exchange rate handler to handle providers
        $url = $this->req_url . 'symbols';

        $response = $this->client->request(
            'GET',
            $url
        );

        $statusCode = $response->getStatusCode();

        if ($statusCode !== 200) throw new ThirdPartyUnavailableHttpException();

        $responseData = $response->toArray();

        if (!isset($responseData['symbols'])) throw new ThirdPartyUnavailableHttpException();

        $content = $responseData['symbols'];

        return $content;
    }

    // change amount to float and do type conversion in a different place
    public function convert(string $from, string $to, float $amount): float
    {

        $urlFormat = $this->req_url . 'convert?from=%s&to=%s&amount=%.2f';
        $url = sprintf($urlFormat, $from, $to, $amount);

        $response = $this->client->request(
            'GET',
            $url
        );

        $statusCode = $response->getStatusCode();

        if ($statusCode !== 200) throw new ThirdPartyUnavailableHttpException();

        $responseData = $response->toArray();
        
        if (!isset($responseData['result'])) throw new ThirdPartyUnavailableHttpException();

        $content = $responseData['result'];

        return $content;
    }
}
