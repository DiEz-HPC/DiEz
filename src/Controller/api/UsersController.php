<?php

namespace App\Controller\api;

use App\Repository\UserRepository;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

#[Route('/api/v2', name: 'users_')]
class UsersController extends AbstractController
{
    private Serializer $serializer;

    public function __construct()
    {
        $encoder = [new JsonEncoder()];
        $normalizer = [new ObjectNormalizer()];
        $this->serializer = new Serializer($normalizer, $encoder);
    }

    #[Route('/users', name: 'users')]
    public function getAllUsers(UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();
        $users = $this->serializer->serialize($users, 'json');
        return new Response(
            content: $users,
            status: Response::HTTP_OK,
            headers: [
                'Content-Type' => 'application/json'
            ]
        );
    }
}
