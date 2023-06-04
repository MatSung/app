<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

class IsValidConversionAmountValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint): void{
        if (!$constraint instanceof IsValidConversionAmount){
            throw new UnexpectedTypeException($constraint, IsNumeric::class);
        }

        if(!is_string($value)){
            throw new UnexpectedValueException($value, 'string');
        }

        if(!is_numeric($value)){
            $this->context->buildViolation($constraint->message)
            ->setParameter('{{ string }}', $value)
            ->addViolation();
            return;
        }

        if(!preg_match('/^\d{1,6}(?:\.\d{1,2})?$/', $value, $matches)){
            $this->context->buildViolation($constraint->message)
            ->setParameter('{{ string }}', $value)
            ->addViolation();
        }
    }
    
}