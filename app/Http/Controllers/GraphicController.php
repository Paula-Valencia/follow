<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GraphicController extends Controller
{
    public function index()
    {
        return view('graficos.index');
    }

    
}
