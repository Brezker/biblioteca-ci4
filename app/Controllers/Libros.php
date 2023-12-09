<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Libro;

class Libros extends Controller
{
    public function index()
    {
        $lib = new Libro();
        $data['libros'] = $lib->orderBy('id', 'ASC')->findAll();
        return view('listar_libros', $data);
    }

    public function guardarLibro()
    {
        if ($this->request->getMethod() === 'post') {
            $titulo = $this->request->getPost('titulo');
            $autor = $this->request->getPost('autor');
            $isbn13 = $this->request->getPost('isbn13');
            $editorial = $this->request->getPost('editorial');
            $precio = $this->request->getPost('precio');
        }

        // Valida y guarda los datos en la base de datos
        $libro = new Libro();
        $libro->insert([
            'titulo' => $titulo,
            'autor' => $autor,
            'isbn13' => $isbn13,
            'editorial' => $editorial,
            'precio' => $precio,
        ]);

        return redirect()->to(base_url('/listar_libros'));
    }
}
