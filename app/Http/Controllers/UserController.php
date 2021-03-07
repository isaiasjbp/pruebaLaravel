<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users =  User::all();
        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('components.nuevoUsuario');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $nombres =   $request->input('nombres');
        $correo =   $request->input('email');
        $password =    $request->input('password');
        $roll = 0;
        $registro_usuario = '';
        if ($request->input('roll')) {
            $roll = 1;
        }
        $datos_usuario = array(
            "name"  => $nombres,
            "email"  => $correo,
            'password' => Hash::make($password),
            'roll' => $roll
        );

        if ($request->input('accion') == 'editar') {
            User::where('id', $request->input('id'))
                ->update($datos_usuario);
            return  $this->listaUsuarios($request);
        }
        if ($request->input('accion') == 'eliminar') {
            User::where('id', $request->input('id'))
                ->delete();
            return  $this->listaUsuarios($request);
        }
        if ($request->input('accion') == 'desactivar') {
            User::where('id', $request->input('id'))
                ->update(['estado' => 0]);
            return  $this->listaUsuarios($request);
        }
        if ($request->input('accion') == 'activar') {
            User::where('id', $request->input('id'))
                ->update(['estado' => 1]);
            return  $this->listaUsuarios($request);
        } else {
            $registro_usuario = User::create($datos_usuario);
        }
        // $registro_usuario = User::latest('id')->first();
        if ($registro_usuario) {
            //  echo "Se registro con exito"; die;
            return  $this->listaUsuarios($request);
            //  return  redirect('/modelos');
        } else {
            die("Error al registrar el usuario!");
        }
        //  echo '<pre>'; print_r($registro_usuario); '</pre>'; die;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listaUsuarios(Request $request) {
        $usuarios = \App\Models\User::all();
        return view('components.listaUsuarios', compact('usuarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        echo '<pre>';
        print_r(time());
        '</pre>';
        die;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        $datosUsuario = User::where('id', $request->input('id'))->get();
        return view('components.nuevoUsuario', compact('datosUsuario'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
