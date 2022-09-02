<?php

namespace App\Tests\Mother;

use App\Entity\Post;
use App\Tests\Mother\AuthorMother;

class PostMother
{
    private static function createValidPost(): Post
    {
        $author = AuthorMother::getValidAuthor();
        $title = 'Calendario editorial para tu blog: como crearlo';
        $content = 'Muchas veces cuando uno busca consejos o maneras de mejorar el SEO de un blog 
        se encuentra con que hace falta cierto conocimiento previo sobre SEO o al menos un mínimo 
        de conocimiento técnico para aplicar muchas de las mejoras que se proponen.Este post recopila....';

        $post = new Post($title, $content, $author);

        return $post;
    }

    static function getValidPost(): Post
    {
        return self::createValidPost();
    }

    static function getPostWithInvalidCategory(): Post
    {
        return self::getValidPost()
            ->setCategory('LISTS');
    }
}
