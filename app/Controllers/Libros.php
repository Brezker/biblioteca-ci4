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
            $id = $this->request->getPost('id'); // Obtener el ID del formulario de edición

            // Verificar si se proporcionó un ID (si está editando)
            if (!empty($id)) {
                // El formulario de edición está enviando datos
                $this->actualizarLibro();
            } else {
                // El formulario de edición no envió un ID, por lo tanto, está agregando un nuevo libro
                $this->agregarLibro();
            }
            return redirect()->to(base_url('/listar_libros'));
        }
    }

    public function agregarLibro()
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
    }

    public function detalles_libro($id)
    {
        $libro = new Libro();
        $data['libro'] = $libro->where('id', $id)->first();

        // Devuelve los detalles del libro como JSON
        return $this->response->setJSON($data['libro']);
    }


    public function actualizarLibro()
    {
        if ($this->request->getMethod() === 'post') {
            $id = $this->request->getPost('id');
            $titulo = $this->request->getPost('titulo_editar');
            $autor = $this->request->getPost('autor_editar');
            $isbn13 = $this->request->getPost('isbn13_editar');
            $editorial = $this->request->getPost('editorial_editar');
            $precio = $this->request->getPost('precio_editar');

            // Valida y actualiza los datos en la base de datos
            $libroModel = new Libro();
            $libroModel->update($id, [
                'titulo' => $titulo,
                'autor' => $autor,
                'isbn13' => $isbn13,
                'editorial' => $editorial,
                'precio' => $precio,
            ]);
        }
    }

    public function borrarLibro($id)
    {
        $libro = new Libro();
        $libro->delete($id);

        return redirect()->to(base_url('/listar_libros'));
    }
}
