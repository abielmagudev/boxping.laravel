<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserSaveRequest;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:users'); // ->only('permissions method')
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index')->with('users', User::all()->sortByDesc('id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create', [
            'user' => new User,
            'roles' => Role::all()->except(1),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserSaveRequest $request)
    {
        $prepared = User::prepare($request->validated());

        if(! $user = User::create($prepared) )
            return redirect()->route('usuarios.create')->withInput( $request->except('clave') )->with('failure', 'Error al guardar nuevo usuario');

        $user->roles()->sync($request->role);

        return redirect()->route('usuarios.index')->with('success', "Usuario {$user->name} guardado");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {
        return redirect()->route('usuarios.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
        return view('users.edit', [
            'user' => $usuario,
            'roles' => Role::all()->except(1),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserSaveRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $prepared = User::prepare($request->validated());

        if(! $user->fill($prepared)->update() )
            return redirect()->route('usuarios.edit', $id)->with('failure', 'Error al actualizar usuario');

        $user->roles()->sync($request->role);

        return redirect()->route('usuarios.edit', $id)->with('success', 'Usuario actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        if(! $usuario->delete() )
            return redirect()->route('usuarios.edit', $usuario)->with('failure', 'Error al eliminar usuario');
        
        return redirect()->route('usuarios.index')->with('success', "Usuario {$usuario->name} eliminado");
    }
}
