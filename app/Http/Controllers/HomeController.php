<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /* *********** */

    public function vistacondiciones(){
        return View::make('condiciones')->render();
        //return view('condiciones')->render();
    }

    /* *********** */

    public function vistaregistro(){
        return View::make('registros')->render();
       // return view('registros')->render();
    }
    /**
     * vista de detalles de file
     * 
     */
    public function vistafile(){
        return View::make('Files.detail_files')->render();
    }
}
