<?php

namespace App\Service\Post;

use App\Repository\PostRepository;

class CheckIfPostExistsService
{
    private PostRepository $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function __invoke(string $title): bool
    {
        $post = $this->postRepository->findBy([
            'title' => $title
        ]);

        return $post ? true : false;
    }
}