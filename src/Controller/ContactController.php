<?php

namespace App\Controller;

use App\Entity\ContactMessage;
use App\Service\ValidateContactForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/api/v2', name: 'form_')]
class ContactController extends AbstractController
{
    private Serializer $serializer;

    public function __construct()
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $this->serializer = new Serializer($normalizers, $encoders);
    }

    #[Route('/contact', name: 'contact', methods: ['POST'])]
    public function newContact(Request $request, ValidatorInterface $validator, EntityManagerInterface $entityManager): Response
    {
        $requestMessage = $request->getContent();
        $contactMessage = $this->serializer->deserialize($requestMessage, ContactMessage::class, 'json');
        $validations = $validator->validate($contactMessage);
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

        $entityManager->persist($contactMessage);
        $entityManager->flush();

        return new Response(
            content: $this->serializer->serialize(['success' => 'Votre message a été envoyé.'], 'json'),
            status: Response::HTTP_CREATED,
            headers: ['Content-Type' => 'application/json'],
        );  
    }
}
