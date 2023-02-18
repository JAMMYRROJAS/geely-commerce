<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Throwable;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:suppliers.index')->only('index');
        $this->middleware('can:suppliers.create')->only('create', 'store');
        $this->middleware('can:suppliers.show')->only('show');
        $this->middleware('can:suppliers.edit')->only('edit', 'update');
        $this->middleware('can:suppliers.destroy')->only('destroy');
    }

    public function index()
    {
        $suppliers = Supplier::get();
        return view('back.supplier.index', compact('suppliers'));
    }

    public function create()
    {
        return view('back.supplier.create');
    }

    public function store(StoreSupplierRequest $request)
    {
        Supplier::create($request->all());
        
        Alert::alert()->success('Todo correcto', 'Proveedor registrado exitosamente!');
        
        return redirect()->route('suppliers.index');
    }

    public function show(Supplier $supplier)
    {
        return view('back.supplier.show', compact('supplier'));
    }

    public function edit(Supplier $supplier)
    {
        return view('back.supplier.edit', compact('supplier'));
    }

    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        $supplier->update($request->all());

        Alert::alert()->success('Todo correcto', 'Proveedor actualizado exitosamente!');

        return redirect()->route('suppliers.index');
    }

    public function destroy(Supplier $supplier)
    {
        try {
            $supplier->delete();
        } catch (Throwable $e) {
            Alert::alert()->error('Error', '¡El proveedor tiene productos asociados!');
            return redirect()->back();
        }

        return redirect()->route('suppliers.index');
    }
}
