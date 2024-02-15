<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:reports.date')->only('reports_date');
        $this->middleware('can:report.results')->only('report_results');
    }

    public function reports_date(){
        $sales = Sale::whereDate('sale_date', Carbon::today('America/Lima'))->get();
        $total = $sales->sum('total');

        return view('back.report.reports_date', compact('sales', 'total'));
    }

    public function report_results(Request $request){
        $fi = $request->fecha_ini. ' 00:00:00';
        $ff = $request->fecha_fin. ' 23:59:59';

        $sales = Sale::whereBetween('sale_date', [$fi, $ff])->get();
        $total = $sales->sum('total');

        return view('back.report.reports_date', compact('sales', 'total'));
    }
}
