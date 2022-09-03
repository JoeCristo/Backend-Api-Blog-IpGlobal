<?php

namespace App\Validator\Post;

use App\Entity\Post;
use App\Service\Post\CheckIfPostExistsService;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * @Annotation
 */
class CheckIfPostExistsValidator extends ConstraintValidator
{
    private CheckIfPostExistsService $checkIfPostExistsService;

    public function __construct(CheckIfPostExistsService $checkIfPostExistsService)
    {
        $this->checkIfPostExistsService = $checkIfPostExistsService;
    }

    public function validate($value, Constraint $constraint)
    {
        if (($this->checkIfPostExistsService)($value)) {
            $this->context->buildViolation('Ya existe un post con el mismo título.')->addViolation();
            return;
        }
    }
}