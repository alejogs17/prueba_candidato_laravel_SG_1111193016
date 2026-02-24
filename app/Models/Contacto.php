<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

    protected $table = 'contactos';

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'direccion',
        'cargo',
        'notas',
        'entidad_id',
        'fecha_nacimiento',
        'creado_por',
        'identificacion', // Adding this as it will be part of the migration
    ];

    public function entidad()
    {
        return $this->belongsTo(Entidad::class , 'entidad_id');
    }
}