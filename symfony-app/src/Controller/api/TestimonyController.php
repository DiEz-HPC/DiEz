<?php

namespace App\Controller\api;

use App\Entity\Post;
use App\Entity\Testimony;
use App\Repository\TestimonyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/api/v2', name: 'testimony_')]
class TestimonyController extends AbstractController
{
    private Serializer $serializer;

    public function __construct()
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $this->serializer = new Serializer($normalizers, $encoders);
    }

    #[Route('/commentaires', name: 'new', methods: ['POST'])]
    public function newTestimony(Request $request, ValidatorInterface $validator, EntityManagerInterface $entityManager): Response
    {
        $testimonyForm = $request->getContent();
        $testimony = $this->serializer->deserialize($testimonyForm, Testimony::class, 'json');
        $validations = $validator->validate($testimony);
        $errors = [];
        foreach ($validations as $error) {
            $errors['errors'][$error->getPropertyPath()][] = $error->getMessage();
        }

        if ($errors) {
            return new Response(
                content: $this->serializer->serialize($errors, 'json'),
                status: Response::HTTP_UNPROCESSABLE_ENTITY,
                headers: ['Content-Type' => 'application/json'],
            );
        }

        $entityManager->persist($testimony);
        $entityManager->flush();

        return new Response(
            content: $this->serializer->serialize(['success' => 'Merci pour votre commentaire.'], 'json'),
            status: Response::HTTP_CREATED,
            headers: ['Content-Type' => 'application/json'],
        );
    }

    #[
        Route('/commentaires', name: 'get', methods: ['GET']),
    ]
    public function getPost(TestimonyRepository $testimonyRepository): Response
    {
        $testimonies = $testimonyRepository->findBy(
            ['isPublished' => true],
            ['createdAt' => 'DESC']
        );
        $testimonies = $this->serializer->serialize($testimonies, 'json');
        return new Response(
            content: $testimonies,
            status: Response::HTTP_OK,
            headers: [
                'content-type' => 'application/json'
            ]
        );
    }
}
