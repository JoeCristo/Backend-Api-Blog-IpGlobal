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

    public function exists(mixed $title): bool
    {
        $posts = $this->postRepository->findBy([
            'title' => $title,
        ]);

        $countPosts = count($posts);

        return $posts && $countPosts > 0;
    }
}
