<?php

namespace App\Http\Controllers\Guest;

use App\Event;
use App\Http\Controllers\Controller;

class CursosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        $e = Event::with('sponsor')->where('visible', 1)
            ->orderBy('f_inicio', 'desc')
            ->get();
        return view('home.cursos', ['eventos' => $e]);
    }

}
