<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamentos';
    protected $primaryKey = 'departamentoID';

    protected $fillable = [
        'descripcion',
    ];
    
    public function usuarios()
    {
        return $this->hasMany(Usuario::class);
    }
}
