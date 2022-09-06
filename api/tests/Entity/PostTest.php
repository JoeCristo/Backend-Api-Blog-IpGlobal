<?php

namespace App\Tests\Entity;

use App\DBAL\Types\PostCategoryType;
use App\Tests\Mother\AuthorMother;
use App\Tests\Mother\PostMother;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    public function testIfPostHasBeenCreated(): void
    {
        $post = PostMother::getValidPost();

        $this->assertEquals(true, 'Calendario editorial para tu blog: como crearlo' === $post->getTitle());
    }

    public function testIfAuthorNameIsEmpty(): void
    {
        $author = AuthorMother::getAuthorEmptyName();

        $this->assertEmpty($author->getName());
    }

    public function testIfPostCategoryIsInvalid(): void
    {
        $post = PostMother::getPostWithInvalidCategory();

        $categories = [
            PostCategoryType::PROBLEM_SOLUTION,
            PostCategoryType::TRENDS,
            PostCategoryType::TUTORIAL,
        ];

        $this->assertNotContains($post->getCategory(), $categories);
    }
}
