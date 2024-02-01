<?php

namespace App\Http\Controllers;
use App\Models\WindowFilms;
use Illuminate\Http\Request;

class WindowFilmsController extends Controller
{
    public function index()
    {
        $data = WindowFilms::get(["name", "id"]);
        return view($data);
    }
}
