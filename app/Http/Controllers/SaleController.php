<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Customer;
use App\Models\Product;
use App\Models\User;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

//PDF
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class SaleController extends Controller
{
    //Para no permitir gestionar una venta sin estar autenticado previamente
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth');
        $this->middleware('can:sales.index')->only('index');
        $this->middleware('can:sales.create')->only('create', 'store');
        $this->middleware('can:sales.show')->only('show');
        $this->middleware('can:sales.pdf')->only('pdf');
        $this->middleware('can:change.status.sales')->only('change_status');
    }

    public function index()
    {
        $sales = Sale::get();
        return view('back.sale.index', compact('sales'));
    }

    public function create()
    {
        $customers = Customer::get();
        $products = Product::where('status', 'ACTIVATE')->get();

        return view('back.sale.create', compact('customers', 'products'));
    }

    public function store(StoreSaleRequest $request)
    {
        $sale = Sale::create($request->all()+[
            'user_id'=>Auth::user()->id,
            'sale_date'=>Carbon::now('America/Lima'),
        ]);

        foreach ($request->product_id as $key => $id) {
            $sale->upd_stock($request->product_id[$key], $request->quantity[$key]);

            $results[] = array("product_id"=>$request->product_id[$key], "quantity"=>$request->quantity[$key], "price"=>$request->price[$key], "discount"=>$request->discount[$key]);
        }

        Alert::alert()->success('Todo correcto', 'Venta registrada exitosamente!');

        $sale->saleDetails()->createMany($results);

        return redirect()->route('sales.index');
    }

    public function show(Sale $sale)
    {
        $subtotal = 0;
        $saleDetails = $sale->saleDetails;
        
        foreach ($saleDetails as $saleDetail) {
            $subtotal += ($saleDetail->quantity*$saleDetail->price) - ($saleDetail->quantity* $saleDetail->price*$saleDetail->discount/100);
        }

        return view('back.sale.show', compact('sale', 'saleDetails', 'subtotal'));
    }

    public function pdf(Sale $sale) {
        $subtotal = 0;
        $receiptDetails = $receipt->receiptDetails;
        
        foreach ($receiptDetails as $receiptDetail) {
            $subtotal += $receiptDetail->quantity * $receiptDetail->price;
        }

        $pdf = PDF::loadView('back.receipt.pdf', compact('receipt', 'subtotal', 'receiptDetails'));

        return $pdf->download('Reporte_de_compra_'.$receipt->id.'.pdf');
    }
}
