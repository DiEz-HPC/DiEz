<?php

namespace App\Controller\api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use App\Repository\ProfileRepository;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;

#[Route("/api/v2", name: "profiles_")]
class ProfileController extends AbstractController
{

    private Serializer $serializer;

    public function __construct()
    {
        $encoder = [new JsonEncoder()];
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
        $normalizer = [new ObjectNormalizer($classMetadataFactory)];
        $this->serializer = new Serializer($normalizer, $encoder);
    }

    #[Route('/profiles', name: 'profiles')]
    public function getAllProfiles(ProfileRepository $profileRepository): Response
    {
        $profiles = $profileRepository->findAll();
        for ($i = 0; $i < count($profiles); $i++) {
            $profiles[$i] = [
                'email' => $profiles[$i]->getUser()->getEmail(),
                'profile' => $profiles[$i]
            ];
        }
        $profiles = $this->serializer->serialize($profiles, 'json', ['groups' => ['user:read']]);
        return new Response(
            content: $profiles,
            status: Response::HTTP_OK,
            headers: [
                'Content-Type' => 'application/json'
            ]
        );
    }
}
