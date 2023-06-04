<?php

namespace App\Service;

interface ExchangeRateProviderInterface
{
    /**
     * Gets available currencies for exchange
     *
     * @return array Array of available symbols.
     */
    public function getSymbols(): array;
    
    
    /**
     * convert
     *
     * @param  string $from Currency code from which to exchange
     * @param  string $to Currency code into which to exchange
     * @param  mixed $amount Amount to convert
     * @return float result of exchange.
     */
    public function convert(string $from, string $to, float $amount): float;
}