<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roleuser extends Model
{
    use HasFactory;

    /**
     * Define el nombre de la tabla asociada con el modelo.
     * En este caso, la tabla 'role_user'.
     */
    protected $table = 'role_user';
}
