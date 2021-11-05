<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Project;
use App\Service\ChartCreator;
use Symfony\UX\Chartjs\Model\Chart;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

#[Route('/admin', name: 'admin_')]
class DashboardController extends AbstractDashboardController
{

  public function __construct(private ChartCreator $chartCreator)
  {
      
  }

    #[Route('', name: 'index')]
    public function index(): Response
    {        
        $params = [
            'data' => [
                'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                'datasets' => [
                    [
                        'label' => 'Nombre d\'employé',
                        'backgroundColor' => 'rgb(255, 99, 132)',
                        'borderColor' => 'rgb(255, 99, 132)',
                        'data' => [3, 3, 3, 3, 3, 3, 3],
                    ],
                   
                ],
            ],
            'options' => [
                'scales' => [
                    'yAxes' => [
                        ['ticks' => ['min' => 0, 'max' => 10]],
                    ],
                ],
            ],
            'attributes' => [
                'id' => '1'
            ]
        ];

        $this->chartCreator->setParams($params);
        $this->chartCreator->setChartType(Chart::TYPE_LINE);

    
        return $this->render('bundles/EasyAdminBundle/welcome.html.twig', [
            'chart' => $this->chartCreator->createChart(),
        ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('DiEz');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('L\'équipe', 'fa fa-user', User::class);
        yield MenuItem::linkToCrud('Les projets', 'fas fa-project-diagram', Project::class);
    }
}
