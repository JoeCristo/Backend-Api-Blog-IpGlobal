<?php

namespace App\Tests\Entity;

use App\DBAL\Types\PostCategoryType;
use PHPUnit\Framework\TestCase;
use App\Tests\Mother\PostMother;
use App\Tests\Mother\AuthorMother;

class PostTest extends TestCase
{
    public function test_if_post_has_been_created(): void
    {
        $post = PostMother::getValidPost();

        $this->assertEquals(true, $post->getTitle() === 'Calendario editorial para tu blog: como crearlo');
    }

    public function test_if_author_name_is_empty(): void
    {
        $author = AuthorMother::getAuthorEmptyName();

        $this->assertEmpty($author->getName());
    }

    public function test_if_post_category_is_invalid(): void
    {
        $post = PostMother::getPostWithInvalidCategory();

        $categories = [
            PostCategoryType::PROBLEM_SOLUTION,
            PostCategoryType::TRENDS,
            PostCategoryType::TUTORIAL
        ];

        $this->assertNotContains($post->getCategory(), $categories);
    }
}
