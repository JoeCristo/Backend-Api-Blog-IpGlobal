<?php

namespace App\Service\Post;

use App\Entity\Post;
use App\Repository\PostRepository;

class CheckIfPostExistsService
{
    private PostRepository $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function exists(string $title): bool
    {
        $posts = $this->postRepository->findBy([
            'title' => $title,
        ]);

        return $posts && count($posts) >= 1;        
    }
}