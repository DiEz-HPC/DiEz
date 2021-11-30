<?php

namespace App\Controller\api;

use App\Repository\SocialRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

#[Route('/api/v2', name: 'social_')]
class SocialController extends AbstractController
{
    private Serializer $serializer;

    public function __construct()
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $this->serializer = new Serializer($normalizers, $encoders);
    }

    #[Route('/socials', name: 'all', methods: ['GET'])]
    public function getAll(SocialRepository $repository): Response
    {
        $socials = $repository->findAll();
        $data = $this->serializer->serialize($socials, 'json');
        return new Response(
            content: $data,
            status: Response::HTTP_OK,
            headers: [
                'content-type' => 'application/json'
            ]
        );

    }
}
