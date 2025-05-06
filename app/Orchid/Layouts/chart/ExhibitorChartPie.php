<?php

namespace App\Orchid\Layouts\chart;

use Orchid\Screen\Layouts\Chart;

class ExhibitorChartPie extends Chart
{
    /**
     * Available options:
     * 'bar', 'line',
     * 'pie', 'percentage'.
     *
     * @var string
     */
    protected $type = 'pie';

    /**
     * Determines whether to display the export button.
     *
     * @var bool
     */
    protected $export = true;

    /**
     * @var int
     */
    protected $height = 300;

    protected $data = [
        'labels' => ['Etiqueta 1', 'Etiqueta 2', 'Etiqueta 3'],
        'datasets' => [
            [
                'label' => 'Mi conjunto de datos',
                'backgroundColor' => ['#FF5733', '#36A2EB', '#4BC0C0'],
                'data' => [10, 20, 30],
            ],
        ],
    ];
}
