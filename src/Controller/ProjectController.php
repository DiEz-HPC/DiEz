<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/v2/projects', name: 'project_')]
class ProjectController extends AbstractController
{
    #[Route('/', name: 'all')]
    public function getAll(ProjectRepository $projectRepository): Response
    {
        $projects = $projectRepository->findAll();
        $response = new Response();
        $response->setContent($this->json($projects));
        $response->setStatusCode(201);
        return $response;
    }
}
