<?php

namespace App\Service;

use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;

class ChartCreator
{

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
    private array $params;

    private string $chartType;

    public function __construct(private ChartBuilderInterface $chartBuilder)
    {
    }

    public function createChart()
    {
        $chart = $this->chartBuilder->createChart($this->chartType);
        $chart->setData($this->params['data']);
        $chart->setAttributes($this->params['attributes']);
        $chart->setOptions($this->params['options']);

        return $chart;
    }

    /**
     * Get the value of params
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Set the value of params
     *
     * @return  self
     */
    public function setParams(array $params): self
    {
        $this->params = $params;

        return $this;
    }

    /**
     * Get the value of chartType
     */
    public function getChartType()
    {
        return $this->chartType;
    }

    /**
     * Set the value of chartType
     *
     * @return  self
     */
    public function setChartType(string $chartType): self
    {
        $this->chartType = $chartType;

        return $this;
    }
}
