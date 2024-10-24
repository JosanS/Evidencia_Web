<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{

    use HasFactory, SoftDeletes;
    protected $table = 'ordenes';
    protected $primaryKey = 'ordenID';

    protected $casts = [
        'fechaCreacion' => 'datetime',
    ];

    protected $fillable = [
        'clienteID',
        'usuarioID',
        'numeroFactura',
        'estadoOrden',
        'fechaCreacion',
        'direccionEntrega',
        'notaAdicional',
        'ordenEliminada',
        'foto_evidencia',
    ];
    
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'clienteID', 'clienteID');
    }

    public function factura()
    {
        return $this->hasOne(Factura::class);
    }

    public function fotos()
    {
        return $this->hasMany(Foto::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
