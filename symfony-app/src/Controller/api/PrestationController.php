<?php

namespace App\Controller\api;

use App\Entity\Prestation;
use App\Repository\PrestationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

#[Route('/api/v2', name: 'prestation_')]
class PrestationController extends AbstractController
{
    private Serializer $serializer;

    public function __construct()
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $this->serializer = new Serializer($normalizers, $encoders);
    }

    #[Route('/prestation/all', name: 'all')]
    public function getAllPrestations(PrestationRepository $prestationRepository): Response
    {
        $prestations = $prestationRepository->findForHomepage();
        $prestations = $this->serializer->serialize($prestations, 'json');
        return new Response(
            content: $prestations,
            status: Response::HTTP_OK,
            headers: [
                'content-type' => 'application/json'
            ]
        );
    }

    #[Route('/prestation/{id}', name: 'one')]
    public function getPrestation(Prestation $prestation): Response
    {
        $prestation = $this->serializer->serialize($prestation, 'json');
        return new Response(
            content: $prestation,
            status: Response::HTTP_OK,
            headers: [
                'content-type' => 'application/json'
            ]
        );
    }

}
