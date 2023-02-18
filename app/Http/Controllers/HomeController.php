<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Receipt;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:home')->only('index');
    }
    
    public function index()
    {
        $comprasmes = DB::select('SELECT monthname(r.receipt_date) as mes, sum(r.total) as totalmes FROM receipts r 
        GROUP BY mes ORDER BY mes DESC LIMIT 12');
        //dd($comprasmes);

        $ventasmes = DB::select('SELECT monthname(s.sale_date) as mes, sum(s.total) as totalmes FROM sales s
        GROUP BY mes ORDER BY mes DESC LIMIT 12');

        $ventasdia = DB::select('SELECT DATE_FORMAT(s.sale_date, "%d/%m/%y") as dia, sum(s.total) as totaldia FROM sales s
        GROUP BY s.sale_date ORDER BY day(s.sale_date) DESC LIMIT 15');
        //dd($ventasdia);

        $totales = DB::select('SELECT (select ifnull(sum(r.total), 0) from receipts r where monthname(r.receipt_date) = monthname(curdate())) as totalcompra, (select ifnull(sum(s.total), 0) from sales s where monthname(s.sale_date) = monthname(curdate())) as totalventa');
        //dd($totales);
        
        $productosvendidos=DB::select('SELECT sum(sd.quantity) as quantity, p.name as nombre, p.id as id , p.stock as stock from products p 
        inner join sale_details sd on p.id=sd.product_id
        inner join sales s on sd.sale_id=s.id where MONTH(s.sale_date)=MONTH(curdate()) and p.status="ACTIVATE"
        group by p.name, p.id, p.stock order by sum(sd.quantity) desc limit 5');

        return view('home', compact('comprasmes', 'ventasmes', 'ventasdia', 'totales', 'productosvendidos'));
    }
}