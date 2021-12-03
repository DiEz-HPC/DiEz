<?php

namespace App\Controller;

use App\Service\ConfigurationTheme;
use App\Service\ResizeImage;
use App\Service\VisitorCounterService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/{reactRouting}/{slug}', name: 'home', defaults: ["reactRouting" => null, "slug" => null], priority: -1)]
    public function index(VisitorCounterService $visitorCounterService, ConfigurationTheme $theme): Response
    {
        $theme->defineTheme();
        $visitorCounterService->getVisitorCounter();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    #[Route('/test', name: 'test')]
    public function test(ResizeImage $resizeImage): Response
    {
        $resizeImage = new ResizeImage('61a5e1f160632_15440567.jpg', 1000, 500);
        return $this->render('home/test.html.twig', [
            'controller_name' => 'DefaultController',
            'image' => $resizeImage->resize(),
        ]);
    }

}
