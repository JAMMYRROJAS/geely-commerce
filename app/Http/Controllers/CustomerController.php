<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Throwable;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:customers.index')->only('index');
        $this->middleware('can:customers.create')->only('create', 'store');
        $this->middleware('can:customers.show')->only('show');
        $this->middleware('can:customers.edit')->only('edit', 'update');
        $this->middleware('can:customers.destroy')->only('destroy');
    }

    public function index()
    {
        $customers = Customer::all();
        return view('back.customer.index', compact('customers'));
    }

    public function create()
    {
        return view('back.customer.create');
    }

    public function store(StoreCustomerRequest $request)
    {
        Customer::create($request->all());        

        Alert::alert()->success('Todo correcto', 'Cliente registrado exitosamente!');

        return redirect()->route('customers.index');
    }

    public function show(Customer $customer)
    {
        $total_receipt= 0;
        
        foreach ($customer->sales as $key =>  $sale) {
            $total_receipt+= $sale->total;
        }

        return view('back.customer.show', compact('customer', 'total_receipt'));
    }

    public function edit(Customer $customer)
    {
        return view('back.customer.edit', compact('customer'));
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->all());

        Alert::alert()->success('Todo correcto', 'Cliente actualizado exitosamente!');

        return redirect()->route('customers.index');
    }

    public function destroy(Customer $customer)
    {
        try {
            $customer->delete();
        } catch (Throwable $e) {
            Alert::alert()->error('Error', '¡El cliente tiene compras asociadas!');
            return redirect()->back();
        }

        return redirect()->route('customers.index');
    }
}
