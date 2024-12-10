<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_register extends Model
{
    // Opcionalmente, define la tabla si no sigue la convención de pluralización
    protected $table = 'user_registers';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'identificacion',
        'name',
        'last_name',
        'email',
        'password',
        'phone',
        'address',
        'department',
        'municipality',
        'id_role',
        'id_contract',
        'id_followup',
        'id_company',
        'id_program',
        'id_academic_level',
        'id_knowledge_network',
        'id_contract_type'
    ];

    // Relación con la tabla roles
    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }

    // Relación con la tabla contracts
    public function contract()
    {
        return $this->belongsTo(Contract::class, 'id_contract');
    }

    // Relación con la tabla followups
    public function followup()
    {
        return $this->belongsTo(Followup::class, 'id_followup');
    }

    // Relación con la tabla companies
    public function company()
    {
        return $this->belongsTo(Company::class, 'id_company');
    }

    // Encriptar la contraseña automáticamente al crear o actualizar
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
