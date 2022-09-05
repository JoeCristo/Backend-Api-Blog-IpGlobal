<?php

namespace App\Tests\Service;

use PHPUnit\Framework\TestCase;
use App\Repository\PostRepository;
use App\Service\Post\CheckIfPostExistsService;

class CheckIfPostExistsServiceTest extends TestCase
{
    const EXISTS_TITLE_POST = 'Calendario editorial para tu blg';

    public function test_if_post_dont_exist()
    {
        $checkIfPostExistsService = $this->getCheckIfPostExistsService();

        $exitsPost = $checkIfPostExistsService->exists(self::EXISTS_TITLE_POST);

        $this->assertEquals(true, $exitsPost === false);
    }

    private function getCheckIfPostExistsService(): CheckIfPostExistsService
    {
        return new CheckIfPostExistsService($this->getPostRepository());
    }

    private function getPostRepository(): PostRepository
    {
        /** @var PostRepository $postRepository */
        $postRepository = $this->getMockBuilder(PostRepository::class)->disableOriginalConstructor()->getMock();

        $postRepository->method('findBy')->willReturn(null);

        return $postRepository;
    }
}