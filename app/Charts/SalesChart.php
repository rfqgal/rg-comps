<?php

declare(strict_types = 1);

namespace App\Charts;

use Carbon\Carbon;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $dateFrom = Carbon::now('Asia/Jakarta')->subDays(30);
        $dateTo = Carbon::now('Asia/Jakarta');

        $monthly_sales = DB::table('sales_details as t1')
            // ->join('products as t2', 't1.product_code', '=', 't2.code')
            ->join('sales as t3', 't1.sale_id', '=', 't3.id')
            ->selectRaw('t3.date, sum(t1.total) as income')
            ->groupBy('t3.date')
            ->whereBetween('t3.date', [$dateFrom, $dateTo])
            ->orderBy('t3.date')
            ->get()
            ->toArray();

        $dates = [];
        $incomes = [];
            
        foreach ($monthly_sales as $value) {
            array_push($dates, Carbon::make($value->date)->format('d-m'));
            array_push($incomes, $value->income);
        }

        return Chartisan::build()
            ->labels($dates)
            ->dataset('Income', $incomes);
    }
}