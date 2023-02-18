<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\ReceiptDetails;
use App\Models\Supplier;
use App\Models\Product;
use App\Http\Requests\StoreReceiptRequest;
use App\Http\Requests\UpdateReceiptRequest;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

//PDF
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class ReceiptController extends Controller
{
    //Para no permitir gestionar una compra sin estar autenticado previamente
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:receipts.index')->only('index');
        $this->middleware('can:receipts.create')->only('create', 'store');
        $this->middleware('can:receipts.show')->only('show');
        $this->middleware('can:receipts.pdf')->only('pdf');
    }

    public function index()
    {
        $receipts = Receipt::get();
        return view('back.receipt.index', compact('receipts'));
    }

    public function create()
    {
        $suppliers = Supplier::get();
        $products = Product::where('status', 'ACTIVATE')->get();

        return view('back.receipt.create', compact('suppliers','products'));
    }

    public function store(StoreReceiptRequest $request)
    {
        $receipt = Receipt::create($request->all()+[
            'user_id'=>Auth::user()->id,
            'receipt_date'=>Carbon::now('America/Lima'),
        ]);

        foreach ($request->product_id as $key => $id) {
            $receipt->upd_stock($request->product_id[$key], $request->quantity[$key]);
            
            $results[] = array("product_id"=>$request->product_id[$key], "quantity"=>$request->quantity[$key], "price"=>$request->price[$key]);
        }

        Alert::alert()->success('Todo correcto','Compra registrada exitosamente!');

        $receipt->receiptDetails()->createMany($results);

        return redirect()->route('receipts.index');
    }

    public function show(Receipt $receipt)
    {
        $subtotal = 0 ;
        $receiptDetails = $receipt->receiptDetails;
        
        foreach ($receiptDetails as $receiptDetail) {
            $subtotal += $receiptDetail->quantity * $receiptDetail->price;
        }

        return view('back.receipt.show', compact('receipt', 'receiptDetails', 'subtotal'));
    }

    public function pdf(Receipt $receipt) {
        $subtotal = 0 ;
        $receiptDetails = $receipt->receiptDetails;
        
        foreach ($receiptDetails as $receiptDetail) {
            $subtotal += $receiptDetail->quantity * $receiptDetail->price;
        }

        $pdf = PDF::loadView('back.receipt.pdf', compact('receipt', 'subtotal', 'receiptDetails'));

        //return $pdf->download('Reporte_de_compra_'.$receipt->id.'.pdf');
        return $pdf->stream('Reporte_de_compra_'.$receipt->id.'.pdf');
    }
}
