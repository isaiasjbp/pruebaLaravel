<?php

namespace App\Http\Controllers;

use App\Models\Modelos;
use App\Models\Marcas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $datos['usuarios'] =  User::all();
        $datos['marcas'] = Marcas::all();
        $datos['modelos']  = Modelos::all();
        return view("layouts/dashboard", ['datos' =>  $datos]);
    }


    public function getBotones() {
        $datos['usuarios'] =  User::all();
        $datos['marcas'] = Marcas::all();
        $datos['modelos']  = Modelos::all();
        return view("components/botones-panel", ['datos' =>  $datos]);
    }


    public function getGrafca() {
        $datos['marcas'] = Modelos::join('marcas', 'modelos.marca_id', '=', 'marcas.id')
        ->get(['marcas.id as marca_id','marcas.nombre', 'modelos.id', 'modelos.modelo','modelos.descripcion',  'modelos.created_at']) ;
        return view("components/grafica", ['datos' =>  $datos]);
    }
}
