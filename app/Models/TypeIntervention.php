<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeIntervention extends Model
{
    use HasFactory;


    public function Interventions()
    {
        return $this->hasMany(Intervention::class);
    }
}
