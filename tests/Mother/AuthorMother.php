<?php

namespace App\Tests\Mother;

use App\Entity\Author;

class AuthorMother
{
    private static function createValidAuthor(): Author
    {
        $name = 'Andrés';
        $surname = 'Campos';

        return (new Author())
            ->setName($name)
            ->setSurname($surname);
    }

    private static function createAuthorEmptyName(): Author
    {
        $name = '';
        $surname = 'Campos';

        return (new Author())
            ->setName($name)
            ->setSurname($surname);
    }

    static function getValidAuthor(): Author
    {
        return self::createValidAuthor();
    }

    static function getAuthorEmptyName(): Author
    {
        return self::createAuthorEmptyName();
    }
}
