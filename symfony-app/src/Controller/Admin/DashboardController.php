<?php

namespace App\Controller\Admin;

use App\Entity\Client;
use App\Entity\ContactMessage;
use App\Entity\Post;
use App\Entity\Social;
use App\Entity\Testimony;
use App\Entity\Theme;
use App\Entity\UploadedImage;
use App\Entity\User;
use App\Entity\Project;
use App\Service\ChartCreator;
use App\Service\VisitorCounterService;
use App\Entity\Profile;
use Symfony\UX\Chartjs\Model\Chart;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

#[Route('/admin', name: 'admin_')]
class DashboardController extends AbstractDashboardController
{

    public function __construct(private ChartCreator $chartCreator, private VisitorCounterService $visitorCounterService)
    {
    }

    #[Route('', name: 'index')]
    public function index(): Response
    {
        $params = $this->visitorCounterService->VisitorChartParams(date('Y'));
        $chart1 = $this->chartCreator->createChart(
            params: $params,
            chartType: Chart::TYPE_LINE
        );

        $messages = $this->getDoctrine()->getRepository(ContactMessage::class)->findBy([], [], 5);

        $projects = $this->getDoctrine()->getRepository(Project::class)->findBy(
            [],
            ['updated_at' => 'DESC'],
            3
        );

        return $this->render('bundles/EasyAdminBundle/welcome.html.twig', [
            'chart1' => $chart1,
            'messages' => $messages,
            'projects' => $projects,
        ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('DiEz')
            ->renderContentMaximized();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Sécurité', 'fa fa-lock', User::class);
        yield MenuItem::linkToCrud('L\'équipe', 'fa fa-user', Profile::class);
        yield MenuItem::linkToCrud('Réseaux Sociaux', 'fas fa-hashtag', Social::class);
        yield MenuItem::linkToCrud('Messages', 'fas fa-envelope-open-text', ContactMessage::class);
        yield MenuItem::linkToCrud('Témoignages', 'fas fa-comment', Testimony::class);
        yield MenuItem::LinkToCrud('Clients', 'fas fa-users', Client::class);
        yield MenuItem::subMenu('Projets', 'fas fa-project-diagram')
            ->setSubItems([
                MenuItem::linkToCrud('Les projets', 'fas fa-folder-open', Project::class),
                MenuItem::linkToRoute('Charger les projets', 'fas fa-sync', 'admin_service_github')
            ]);
        yield MenuItem::linkToCrud('Les actus', 'fas fa-newspaper', Post::class);
        yield MenuItem::subMenu('Médias', 'fas fa-photo-video')
            ->setSubItems([
                MenuItem::linkToCrud('Themes', 'fas fa-palette', Theme::class),
            ]);
    }
}
