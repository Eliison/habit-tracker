<?php

namespace App\Http\Controllers;

class SiteController extends Controller
{
    public function index()
    {
        $name = "Elison";
        $habits = [
            'Correr',
            'Estudar',
        ];
        return view('home', compact('name', 'habits'));
    }
}
