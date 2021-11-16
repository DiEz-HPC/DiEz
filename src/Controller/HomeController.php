<?php

namespace App\Controller;

use App\Repository\VisitorCounterRepository;
use App\Service\VisitorCounterService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/{reactRouting}/{slug}', name: 'home', defaults: ["reactRouting" => null, "slug" => null], priority: -1)]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    #[Route('/test', name: 'test')]
    public function test(VisitorCounterService $visitorCounterService, VisitorCounterRepository $visitorCounterRepository): Response
    {
        $visitorCounterService->getVisitorCounter();

        dd($visitorCounterRepository->findCountByYear('2021'));
        return $this->render('home/test.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
}
