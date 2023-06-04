<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

class IsValidConversionAmount extends Constraint
{
    public string $message = 'The given amount is not a valid amount.';

}