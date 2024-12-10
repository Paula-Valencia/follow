<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * Atributos que se pueden asignar de manera masiva.
     * Estos son los campos que se pueden llenar directamente a través de la asignación masiva.
     */
    protected $fillable = [
        'guard_name',
    ];

    /**
     * Relación muchos a muchos con el modelo User.
     * Un rol puede tener múltiples usuarios.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user');
    }
}
