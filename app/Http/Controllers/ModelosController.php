<?php

namespace App\Http\Controllers;

use App\Models\Marcas;
use App\Models\Modelos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModelosController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() { 
        $modelos = Modelos::join('marcas', 'modelos.marca_id', '=', 'marcas.id') 
             ->get(['marcas.nombre', 'modelos.id', 'modelos.modelo','modelos.descripcion',  'modelos.created_at']) ;
        return view('components.listadoModelos',  compact('modelos'));
    }
 
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() { 
        $marcas = Marcas::all(); 
        return view('components.nuevoModelo', compact('marcas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $marcaId =   $request->input('marca');
        $nombre =   $request->input('nombre');
        $descripcion =   $request->input('descripcion'); 
        $registro_modelo = '';

        $datos_modelo = array(
            "modelo"  => $nombre,
            "descripcion"  => $descripcion,
            'marca_id' => $marcaId
        );

        if ($request->input('accion') == 'editar') {
            Modelos::where('id', $request->input('id'))
                ->update($datos_modelo);
            return  $this->index($request);
        }
        if ($request->input('accion') == 'eliminar') {
            Modelos::where('id', $request->input('id'))
                ->delete();
            return  $this->index($request);
        }
        if ($request->input('accion') == 'desactivar') {
            Modelos::where('id', $request->input('id'))
                ->update(['estado' => 0]);
            return  $this->index($request);
        }
        if ($request->input('accion') == 'activar') {
            Modelos::where('id', $request->input('id'))
                ->update($datos_modelo);
            return  $this->index($request);
        } else {
            $registro_modelo = Modelos::create($datos_modelo);
        }
        // $registro_modelo = Modelos::latest('id')->first();
        if ($registro_modelo) {
            //  echo "Se registro con exito"; die;
            return  $this->index($request);
            //  return  redirect('/modelos');
        } else {
            die("Error al registrar la modelo!");
        }
        //  echo '<pre>'; print_r($registro_modelo); '</pre>'; die;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        $datosModelo = Modelos::where('id', $request->input('id'))->get();
        $marcas = Marcas::all(); 
        return view('components.nuevoModelo', compact('datosModelo'), compact('marcas'));
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
