<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'telephone', 'followup_id'];

    protected $allowIncluded = ['followup'];

    protected $allowFilter = ['id', 'name', 'email', 'telephone', 'followup_id'];

    protected $allowSort = ['id', 'name', 'email', 'telephone', 'followup_id'];

    public function followup() {
        return $this->belongsTo('\App\Models\Followup', 'followup_id');
    }

    public function scopeIncluded(Builder $query) {
        if (empty($this->allowIncluded) || empty(request('included'))) {
            return;
        }

        $relations = explode(',', request('included'));
        $allowIncluded = collect($this->allowIncluded);

        foreach ($relations as $key => $relationship) {
            if (!$allowIncluded->contains($relationship)) {
                unset($relations[$key]);
            }
        }

        // Ejecutamos el query con las relaciones permitidas
        $query->with($relations);
    }

    public function scopeFilter(Builder $query) {
        if (empty($this->allowFilter) || empty(request('filter'))) {
            return;
        }

        $filters = request('filter');
        $allowFilter = collect($this->allowFilter);

        foreach ($filters as $filter => $value) {
            if ($allowFilter->contains($filter)) {
                // Para campos que no son texto, usamos "=" en vez de "LIKE"
                if (in_array($filter, ['followup_id'])) {
                    $query->where($filter, $value); // Para followup_id, usa igualdad
                } else {
                    $query->where($filter, 'LIKE', '%' . $value . '%'); // Para otros campos, usa LIKE
                }
            }
        }
    }

    public function scopeSort(Builder $query) {
        if (empty($this->allowSort) || empty(request('sort'))) {
            return; // Salimos si no hay nada que ordenar
        }

        $sortFields = explode(',', request('sort'));
        $allowSort = collect($this->allowSort);

        foreach ($sortFields as $sortField) {
            $direction = 'asc';

            if (substr($sortField, 0, 1) === '-') {
                $direction = 'desc';
                $sortField = substr($sortField, 1);
            }

            // Si el campo de ordenamiento está permitido, lo agregamos a la consulta
            if ($allowSort->contains($sortField)) {
                $query->orderBy($sortField, $direction); // Ejecutamos la query con la dirección deseada
            }
        }
    }
}
