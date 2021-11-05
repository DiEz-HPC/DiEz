<?php

namespace App\Service;

use Symfony\UX\Chartjs\Model\Chart;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;

class ChartCreator
{
    public function __construct(private ChartBuilderInterface $chartBuilder)
    {
    }

    /**
     * [
     * 'data' => [
     *      'labels' => [''],
     *      'datasets' => [
     *          [
     *              'label' => '',
     *              'backgroundColor' => '',
     *              'borderColor' => '',
     *              'data' =>[] ,
     *          ],
     *          [
     *           'label' => '',
     *           'backgroundColor' => '',
     *           'borderColor' => '',
     *           'data' => [],
     *          ],
     *      ],
     *  ],
     *  'options' => [
     *      'scales' => [
     *          'yAxes' => [
     *              ['ticks' => ['min' => int, 'max' => int]],
     *          ],
     *      ],
     *   ],
     *   'attributes' => [
     *      'id' => ''
     *   ]
     * ]
     */
    public function createChart(array $params, string $chartType)
    {
        $chart = $this->chartBuilder->createChart($chartType);

        $chart->setData($params['data']);
        $chart->setOptions($params['options']);
        $chart = $this->setAttributes($params, $chart);
        return $chart;
    }
    
    private function setAttributes (array $params, Chart $chart)
    {
        if (isset($params['attributes'])){
            $chart->setAttributes($params['attributes']);
        }

        return $chart;
    }
}
