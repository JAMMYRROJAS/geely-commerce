<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commerce;
use App\Http\Requests\UpdateCommerceRequest;
use RealRashid\SweetAlert\Facades\Alert;

class CommerceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:commerce.index')->only('index');
        $this->middleware('can:commerce.update')->only('update');
    }

    public function index()
    {
        $commerce = Commerce::where('id', 1)->firstOrFail();
        return view('back.commerce.index', compact('commerce')); 
    }

    public function update(UpdateCommerceRequest $request, $id)
    {

        $commerce = Commerce::findOrFail($id);
            
        $commerce->name = request('name');
        $commerce->description = request('description');
        $commerce->address = request('address');
        $commerce->phone = $request->get('phone');
        $commerce->email = $request->get('email');
        if($request->hasFile('logo')){
            $file = $request->logo;
            $logo_name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path("/logo"), $logo_name);
            $commerce->logo = $logo_name;
        }

        Alert::alert()->success('Todo correcto', '¡Datos del negocio actualizados exitosamente!');

        $commerce->update();
        
        return redirect()->route('commerce.index');
    }

    public function destroy(Commerce $commerce)
    {
        //
    }
}
