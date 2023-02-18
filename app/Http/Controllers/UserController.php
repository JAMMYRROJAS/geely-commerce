<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Throwable;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:users.index')->only('index');
        $this->middleware('can:users.create')->only('create', 'store');
        $this->middleware('can:users.edit')->only('edit', 'update');
        $this->middleware('can:users.destroy')->only('destroy');
    }

    public function index()
    {
        $users = User::with('roles')->get();
        return view('back.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::get();
        return view('back.user.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        
        //Encriptamos la contraseña ingresada
        $user->update(['password' => Hash::make($request->password)]);
        
        $user->roles()->sync($request->get('roles'));

        Alert::alert()->success('Todo correcto', 'Usuario registrado exitosamente!');

        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        $total_sold = 0;
        
        foreach ($user->sales as $key =>  $sale) {
            $total_sold += $sale->total;
        }

        $total_receipt = 0;
        foreach ($user->receipts as $key =>  $receipt) {
            $total_receipt += $receipt->total;
        }

        return view('back.user.show', compact('user', 'total_receipt', 'total_sold'));
    }

    public function edit(User $user)
    {
        $roles = Role::get();
        return view('back.user.edit', compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->get('roles'));

        Alert::alert()->success('Todo correcto', 'Usuario actualizado exitosamente!');

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
        } catch (Throwable $e) {
            return redirect()->back()->with('toast_error', '¡El usuario tiene operaciones asociadas!');
        }

        return redirect()->back();
    }
}
