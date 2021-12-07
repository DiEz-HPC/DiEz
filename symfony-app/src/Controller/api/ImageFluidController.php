<?php

namespace App\Controller\api;

use App\Repository\ImageFluidRepository;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

#[Route('/api/v2', name: 'imagesFluids_')]
class ImageFluidController extends AbstractController
{
    private Serializer $serializer;

    public function __construct()
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $this->serializer = new Serializer($normalizers, $encoders);
    }

    #[
        Route('/imagesFluids/{imageName}', name: 'all'),
    ]
    public function getAllImagesFluidsByBaseName(string $imageName, ImageFluidRepository $imageFluidRepository): Response
    {
        $images = $imageFluidRepository->findBy(['baseImageName' => $imageName]);
        $images = $this->serializer->serialize($images, 'json');
        return new Response(
            content: $images,
            status: Response::HTTP_OK,
            headers: [
                'content-type' => 'application/json'
            ]
        );
    }
}
