<?php

namespace App\Controller;

use App\Service\ConfigurationTheme;
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
        // Active this header only on prod
        if ($_ENV['APP_ENV'] === 'prod') {
            header("Content-Security-Policy: default-src '*'; img-src 'self' data: https:; script-src 'self' 'unsafe-inline' 'unsafe-eval' *; style-src 'self' 'unsafe-inline' https:; font-src 'self' data: https:; connect-src 'self';");
        }
        return $this->render('home/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
}
