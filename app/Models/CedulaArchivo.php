<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CedulaArchivo extends Model
{
    protected $table = 'cedula_archivo';
    
    protected $fillable = ['folio','file_path','tipo_consulta'];

    use HasFactory;
}