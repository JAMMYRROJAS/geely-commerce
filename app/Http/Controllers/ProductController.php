<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Throwable;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:products.index')->only('index');
        $this->middleware('can:products.create')->only('create', 'store');
        $this->middleware('can:products.show')->only('show');
        $this->middleware('can:products.edit')->only('edit', 'update');
        $this->middleware('can:products.destroy')->only('destroy');
        $this->middleware('can:change.status.products')->only('change_status');
    }

    public function index()
    {
        $products = Product::all();

        return view('back.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('back.product.create', compact('categories', 'suppliers'));
    }

    public function store(StoreProductRequest $request)
    {
        $product = new Product();
            
        $product->name = request('name');
        $product->large_description = request('large_description');
        $product->small_description = request('small_description');
        $product->category_id = $request->get('category_id');
        $product->supplier_id = $request->get('supplier_id');
        $product->sell_price = request('sell_price');
        if($request->hasFile('image')){
            $file = $request->image;
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/image"), $image_name);
            $product->image = $image_name;
        }

        Alert::alert()->success('Todo correcto','¡Producto registrado exitosamente!');

        $product->save();
        
        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        return view('back.product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('back.product.edit', compact('product', 'categories', 'suppliers')); 
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
            
        $product->name = request('name');
        $product->large_description = request('large_description');
        $product->small_description = request('small_description');
        $product->category_id = $request->get('category_id');
        $product->supplier_id = $request->get('supplier_id');
        $product->sell_price = request('sell_price');
        if($request->hasFile('image')){
            $file = $request->image;
            $image_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/image"), $image_name);
            $product->image = $image_name;
        }

        Alert::alert()->success('Todo correcto','¡Producto actualizado exitosamente!');

        $product->update();
        
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
        } catch (Throwable $e) {
            return redirect()->back()->with('toast_error', '¡El producto tiene operaciones asociadas!');
        }

        return redirect()->route('products.index');
    }

    //Cambiar estado del producto
    public function change_status(Product $product) {
        if ($product->status == 'ACTIVATE') {
            $product->update(['status'=>'DESACTIVATE']);
        } else {
            $product->update(['status'=>'ACTIVATE']);
        } 

        return redirect()->back(); //Retorna a la vista anterior
    }
}
