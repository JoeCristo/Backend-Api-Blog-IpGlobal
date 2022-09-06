<?php

namespace App\Tests\Service;

use App\Repository\PostRepository;
use App\Service\Post\CheckIfPostExistsService;
use PHPUnit\Framework\TestCase;

class CheckIfPostExistsServiceTest extends TestCase
{
    public const EXISTS_TITLE_POST = 'Calendario editorial para tu blg';

    public function testIfPostDontExist(): void
    {
        $checkIfPostExistsService = $this->getCheckIfPostExistsService();

        $exitsPost = $checkIfPostExistsService->exists(self::EXISTS_TITLE_POST);

        $this->assertEquals(true, false === $exitsPost);
    }

    private function getCheckIfPostExistsService(): CheckIfPostExistsService
    {
        return new CheckIfPostExistsService($this->getPostRepository());
    }

    private function getPostRepository(): PostRepository
    {
        $postRepository = $this->getMockBuilder(PostRepository::class)->disableOriginalConstructor()->getMock();

        $postRepository->method('findBy')->willReturn(null);

        /* @var PostRepository $postRepository */
        return $postRepository;
    }
}
