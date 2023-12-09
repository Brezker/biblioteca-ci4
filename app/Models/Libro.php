<?php

namespace App\Models;

use CodeIgniter\Model;

class Libro extends Model
{
    // protected $DBGroup = 'default';
    protected $table = 'libros';
    protected $primaryKey = 'id';
    // protected $returnType = 'array';
    protected $allowedFields = ['titulo', 'autor', 'editorial', 'precio'];
}
