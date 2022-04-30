<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserSaveRequest;
use App\User;

class UserController extends Controller
{
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
            'user' => new User
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
        return view('users.edit')->with('user', $usuario);
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
        $prepared = User::prepare($request->validated());

        $saved = User::where('id', $id)->update($prepared) 
                ? ['success', 'Usuario actualizado']
                : ['failure', 'Error al actualizar usuario'];

        return redirect()->route('usuarios.edit', $id)->with($saved[0], $saved[1]);
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
