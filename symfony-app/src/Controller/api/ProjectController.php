<?php

namespace App\Controller\api;

use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

#[Route('/api/v2', name: 'project_')]
class ProjectController extends AbstractController
{
    private Serializer $serializer;

    public function __construct()
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $this->serializer = new Serializer($normalizers, $encoders);
    }

    #[Route('/projects', name: 'all')]
    public function getAllProjects(ProjectRepository $projectRepository): Response
    {
        $projects = $projectRepository->findBy([
            'homeVisible' => true,
        ]);
        $projects = $this->serializer->serialize($projects, 'json');
        return new Response(
            content: $projects,
            status: Response::HTTP_OK,
            headers: [
                'content-type' => 'application/json'
            ]
        );
    }
}
