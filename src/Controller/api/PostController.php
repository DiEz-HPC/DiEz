<?php

namespace App\Controller\api;

use App\Entity\Post;
use App\Repository\PostRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

#[Route('/api/v2', name: 'post_')]
class PostController extends AbstractController
{
    private Serializer $serializer;

    public function __construct()
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $this->serializer = new Serializer($normalizers, $encoders);
    }

    #[
        Route('/posts/last/{number}', name: 'by_number'),
    ]
    public function getLastPosts(string $number, PostRepository $postRepository): Response
    {
        $posts = $postRepository->findBy([], ['id' => 'DESC'], $number);
        $posts = $this->serializer->serialize($posts, 'json');
        return new Response(
            content: $posts,
            status: Response::HTTP_OK,
            headers: [
                'content-type' => 'application/json'
            ]
        );
    }

    #[
        Route('/posts/{slug}', name: 'by_slug'),
        ParamConverter('post', class: Post::class, options: ['mapping' => ['slug' => 'slug']]),
    ]
    public function getPost(Post $post): Response
    {
        $post->setArticle(str_replace('<div>', '', $post->getArticle()));
        $post->setArticle(str_replace('</div>', '', $post->getArticle()));
        $post = $this->serializer->serialize($post, 'json');
        return new Response(
            content: $post,
            status: Response::HTTP_OK,
            headers: [
                'content-type' => 'application/json'
            ]
        );
    }

    #[
        Route('/posts', name: 'all'),
    ]
    public function getPosts(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findBy([], ['id' => 'DESC']);
        $posts = $this->serializer->serialize($posts, 'json');
        return new Response(
            content: $posts,
            status: Response::HTTP_OK,
            headers: [
                'content-type' => 'application/json'
            ]
        );
    }

}
