<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    // Define los campos que se pueden asignar masivamente
    protected $fillable = [
        'codigo',
        'tipo',
        'fecha_inicio',
        'fecha_fin',
        'id_company'
    ];

    // Relación con la tabla companies
    public function company()
    {
        return $this->belongsTo(Company::class, 'id_company');
    }
}
