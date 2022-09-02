<?php

namespace App\DBAL\Types;

use Fresh\DoctrineEnumBundle\DBAL\Types\AbstractEnumType;

class PostCategoryType extends AbstractEnumType
{
    public const PROBLEM_SOLUTION = 'PROBLEM_SOLUTION';
    public const TUTORIAL = 'TUTORIAL';
    public const TRENDS = 'TRENDS';

    protected static $choices = [
        self::PROBLEM_SOLUTION => 'Problema-solución',
        self::TUTORIAL => 'Tutoriales',
        self::TRENDS => 'Tendencias',
    ];
}
