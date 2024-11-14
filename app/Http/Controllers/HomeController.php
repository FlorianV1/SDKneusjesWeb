<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class HomeController extends Controller

{
    public function index()
    {
        $tournaments = Tournament::all();
        return view('index')->with('tournaments', $tournaments);
    }

}
