<?php

namespace App\Validator\Post;

use App\Service\Post\CheckIfPostExistsService;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * @Annotation
 */
class CheckIfPostExistsValidator extends ConstraintValidator
{
    public const MESSAGE = 'Ya existe un post con el mismo título.';

    private CheckIfPostExistsService $checkIfPostExistsService;

    public function __construct(
        CheckIfPostExistsService $checkIfPostExistsService)
    {
        $this->checkIfPostExistsService = $checkIfPostExistsService;
    }

    public function validate(mixed $value, Constraint $constraint): void
    {
        if ($this->checkIfPostExistsService->exists($value)) {
            $this->context->buildViolation(self::MESSAGE)->addViolation();

            return;
        }
    }
}
