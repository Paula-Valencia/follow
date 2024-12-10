<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Relación muchos a muchos con el modelo Role.
     * Un usuario puede tener múltiples roles.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }
    // En User.php


    /**
     * Atributos que se pueden asignar de manera masiva.
     * Estos son los campos que se pueden llenar directamente a través de la asignación masiva.
     */
    protected $fillable = [
            'name',
            'last_name', // Asegúrate de que esté incluido aquí
            'email',
            'department',
            'municipality',
            'password',
        ];



    /**
     * Atributos que deben ocultarse en arrays.
     * Estos atributos no se incluirán cuando se convierta el modelo a un array o JSON.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Atributos que deben ser convertidos a tipos nativos.
     * Define cómo se deben convertir ciertos atributos cuando se accede a ellos.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
