<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Libro;

class Libros extends Controller
{
    public function index()
    {
        $libro = new Libro();
        return view('listar_libros');
        // Revisar los datos de la BD
        // $lib = new Libro();
        // var_dump($lib->findAll());
    }
}
