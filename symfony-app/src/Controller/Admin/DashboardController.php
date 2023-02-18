<?php

namespace App\Controller\Admin;

use App\Entity\Post;
use App\Entity\User;
use App\Entity\Theme;
use App\Entity\Client;
use App\Entity\Social;
use App\Entity\Profile;
use App\Entity\Project;
use App\Entity\Template;
use App\Entity\Testimony;
use App\Entity\Prestation;
use App\Service\ChartCreator;
use App\Entity\ContactMessage;
use App\Entity\FormatImageSize;
use Symfony\UX\Chartjs\Model\Chart;
use App\Service\VisitorCounterService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Symfony\Component\Security\Core\User\UserInterface;
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
            ->setTitle('Dev It Easy')
            ->renderContentMaximized();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::subMenu('Utilisateurs', 'fas fa-users-cog')
            ->setSubItems([
                MenuItem::linkToCrud('Sécurité', 'fas fa-user', User::class),
                MenuItem::linkToCrud('Profils', 'fas fa-user', Profile::class),
            ]);
        yield MenuItem::subMenu('Contenus', 'fas fa-file-alt')
            ->setSubItems([
                MenuItem::linkToCrud('Réseaux Sociaux', 'fas fa-hashtag', Social::class),
                MenuItem::linkToCrud('Témoignages', 'fas fa-comment', Testimony::class),
                MenuItem::linkToCrud('Les actus', 'fas fa-newspaper', Post::class),
            ]);
        yield MenuItem::subMenu('Entreprise', 'fas fa-file-alt')
            ->setSubItems([
                MenuItem::linkToCrud('Messages', 'fas fa-envelope-open-text', ContactMessage::class),
                MenuItem::linkToCrud('Clients', 'fas fa-users', Client::class),
                MenuItem::linkToCrud('Nos templates', 'fas fa-folder', Template::class),
                MenuItem::linkToCrud('Les prestations', 'fas fa-briefcase', Prestation::class);
            ]);
        yield MenuItem::subMenu('Projets', 'fas fa-project-diagram')
            ->setSubItems([
                MenuItem::linkToCrud('Les projets', 'fas fa-folder-open', Project::class),
                MenuItem::linkToRoute('Charger les projets', 'fas fa-sync', 'admin_service_github')
            ]);
        yield MenuItem::subMenu('Médias', 'fas fa-photo-video')
            ->setSubItems([
                MenuItem::linkToCrud('Themes', 'fas fa-palette', Theme::class),
                MenuItem::linkToCrud('Formats d\'images', 'fas fa-images', FormatImageSize::class),
            ]);
    }

    public function configureUserMenu(UserInterface $user): UserMenu
    {
        $image = '';
        $firstname = $user->getUserIdentifier();
        if ($user->getProfile()) {
            $image = '/uploads/images/' . $user->getProfile()->getImageName();
            $firstname = $user->getProfile()->getFirstname();
        }
        return parent::configureUserMenu($user)
            ->setName($firstname)
            ->setAvatarUrl($image)
            ->addMenuItems([
                MenuItem::linkToUrl('Retour sur le site', 'fas fa-home', 'https://deviteasy.fr'),
            ]);
    }
}
