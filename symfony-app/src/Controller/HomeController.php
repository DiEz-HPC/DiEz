<?php

namespace App\Controller;

use App\Service\ConfigurationTheme;
use App\Service\Image\ResizeImage;
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
        $resizeImage->setFileName('61ab86a8a6c74_background-image.png');
        return $this->render('home/test.html.twig', [
            'controller_name' => 'DefaultController',
            'image' => $resizeImage->resize(),
        ]);
    }

}
