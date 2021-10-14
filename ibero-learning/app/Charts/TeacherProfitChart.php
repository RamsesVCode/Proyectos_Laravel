<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class TeacherProfitChart extends BaseChart
{
    public ?string $name = "profit";
    public ?string $routeName = "teacher.profit";
    public ?string $prefix = "teacher";
    public ?array $middlewares = ['web','auth','teacher'];


    public function handler(Request $request): Chartisan
    {
        return Chartisan::build()
            ->labels(['First', 'Second', 'Third'])
            ->dataset('Sample', [1, 2, 3])
            ->dataset('Sample 2', [3, 2, 1]);
    }
}