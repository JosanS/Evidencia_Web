<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $primaryKey = 'usuarioID';

    protected $fillable = [
        'nombre',
        'usuario',
        'contraseña',
        'rol_usuario',
        'departamentoID',
    ];
    
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function ordenes()
    {
        return $this->hasMany(Orden::class);
    }
}

