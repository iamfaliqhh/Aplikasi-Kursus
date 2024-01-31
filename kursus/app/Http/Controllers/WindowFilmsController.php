<?php

namespace App\Http\Controllers;
use App\Models\WindowFilms;
use Illuminate\Http\Request;

class WindowFilmsController extends Controller
{
    public function create()
    {
        $windowfilms = WindowFilms::all();
        return view('users.create', compact('windowfilms'));
    }
}
