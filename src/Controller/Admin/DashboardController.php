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
                        'label' => 'Exemple1',
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
            ]
        ];
        $params2 = [
            'data' => [
                'labels' => ['rouge', 'Orange', 'Jaune', 'vert'],
                'datasets' => [
                    [
                        'label' => '',
                        'backgroundColor' => [
                            'rgb(255, 45, 0)',
                            'rgb(255, 139, 0 )',
                            'rgb(255, 243, 0 )',
                            'rgb(73, 255, 0 )',
                           
                        ],
                        'borderColor' => [],
                        'data' => [8, 3, 3, 3],
                    ],
                   
                ],
            ],
            'options' => [
                'legend' =>[
                    'position' => 'bottom'
                ]
            ]
        ];

        $chart1= $this->chartCreator->createChart(
            params: $params, 
            chartType: Chart::TYPE_LINE
        );
    
        $chart2= $this->chartCreator->createChart(
            params: $params2, 
            chartType: Chart::TYPE_PIE
        );

        return $this->render('bundles/EasyAdminBundle/welcome.html.twig', [
            'chart1' => $chart1,
            'chart2' => $chart2
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
