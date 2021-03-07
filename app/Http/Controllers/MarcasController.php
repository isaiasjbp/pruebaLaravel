<?php

namespace App\Http\Controllers;

use App\Models\Marcas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarcasController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $marcas =  Marcas::all();
        return view('components.listadoMarcas', compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('components.nuevaMarca');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $nombre =   $request->input('nombre');
        $descripcion =   $request->input('descripcion');

        $registro_marca = '';

        $datos_marca = array(
            "nombre"  => $nombre,
            "descripcion"  => $descripcion,
            'user_id' => Auth::user()->id
        );

        if ($request->input('accion') == 'editar') {
            Marcas::where('id', $request->input('id'))
                ->update($datos_marca);
            return  $this->index($request);
        }
        if ($request->input('accion') == 'eliminar') {
            Marcas::where('id', $request->input('id'))
                ->delete();
            return  $this->index($request);
        }
        if ($request->input('accion') == 'desactivar') {
            Marcas::where('id', $request->input('id'))
                ->update(['estado' => 0]);
            return  $this->index($request);
        }
        if ($request->input('accion') == 'activar') {
            Marcas::where('id', $request->input('id'))
                ->update($datos_marca);
            return  $this->index($request);
        } else {
            $registro_marca = Marcas::create($datos_marca);
        }
        // $registro_marca = Marcas::latest('id')->first();
        if ($registro_marca) {
            //  echo "Se registro con exito"; die;
            return  $this->index($request);
            //  return  redirect('/modelos');
        } else {
            die("Error al registrar la marcar!");
        }
        //  echo '<pre>'; print_r($registro_marca); '</pre>'; die;
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
        $datosMarca = Marcas::where('id', $request->input('id'))->get();
        return view('components.nuevaMarca', compact('datosMarca'));
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
