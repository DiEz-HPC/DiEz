<?php

namespace App\Service;

use DateTimeZone;
use DateTimeImmutable;
use App\Entity\VisitorCounter;
use App\Repository\VisitorCounterRepository;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\RequestStack;

class VisitorCounterService
{
    private const MONTH = [
        1   => 'Janvier',
        2   => 'Février',
        3   => 'Mars',
        4   => 'Avril',
        5   => 'Mai',
        6   => 'Juin',
        7   => 'Juillet',
        8   => 'Août',
        9   => 'Septembre',
        10  => 'Octobre',
        11  => 'Novembre',
        12  => 'Décembre',
    ];

    public function __construct(
        private RequestStack $request,
        private VisitorCounterRepository $visitorCounterRepository,
        private EntityManagerInterface $em
    ) {
    }

    public function getVisitorCounter(): null|bool
    {
        $ipVisitor = $this->request->getCurrentRequest()->server->get('REMOTE_ADDR');
        $date = new DateTimeImmutable('', new DateTimeZone('Europe/Paris'));
        $visitors = $this->visitorCounterRepository->findBy(['IpAdress' => $ipVisitor]);

        foreach ($visitors as $oldVisitor) {
            if ($oldVisitor->getDate()->format('d/m/Y') === $date->format('d/m/Y')) {
                return null;
            }
        }

        $visitor = new VisitorCounter();
        $visitor->setIpAdress($ipVisitor);
        $visitor->setDate($date);

        $this->em->persist($visitor);
        $this->em->flush();

        return true;
    }

    private function getVisitorsByMonth(string $date): array
    {
        $visitors = $this->visitorCounterRepository->findCountByYear($date);
        $years = [];
        foreach (self::MONTH as $key => $value) {
            if (isset($visitors[$key])) {
                $years[$value] = $visitors[$key];
            } else {
                $years[$value] = 0;
            }
        }

        return $years;
    }

    public function VisitorChartParams(string $date): array
    {
        $years = $this->getVisitorsByMonth($date);
        $maxData = max($years);
        $labels = [];
        $data = [];
        foreach ($years as $key => $value) {
            $labels[] = $key;
            $data[] = $value;
        }

        return [
            'data' => [
                'labels' => $labels,
                'datasets' => [
                    [
                        'label' => 'Nombre de visiteur pour l\'année ' . $date,
                        'backgroundColor' => 'rgb(86, 198, 255)',
                        'borderColor' => 'rgb(255, 255, 255)',
                        'data' => $data,
                    ],
                ],
            ],
            'options' => [
                'scales' => [
                    'yAxes' => [
                        ['ticks' => ['min' => 0, 'max' => $maxData]],
                    ],
                ],
            ]
        ];
    }
}
