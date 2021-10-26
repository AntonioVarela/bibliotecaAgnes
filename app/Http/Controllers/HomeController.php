<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\libro;

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
        $libros = libro::orderBy('identificador', 'ASC')->paginate(10);
        return view('home')->with('libros',$libros)->with('buscar','');
    }
}
