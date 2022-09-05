<?php

namespace App\Validator\Post;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Constraint;
use App\Service\Post\CheckIfPostExistsService;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * @Annotation
 */
class CheckIfPostExistsValidator extends ConstraintValidator
{
    private CheckIfPostExistsService $checkIfPostExistsService;

    public function __construct(
        CheckIfPostExistsService $checkIfPostExistsService)
    {
        $this->checkIfPostExistsService = $checkIfPostExistsService;
    }

    public function validate($value, Constraint $constraint)
    {
        if ($this->checkIfPostExistsService->exists($value)) {
            $this->context->buildViolation('Ya existe un post con el mismo título.')->addViolation();

            return;
        }
    }
}