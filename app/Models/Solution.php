<?php

namespace App\Models;

use Database\Factories\SolutionFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    use HasFactory;
    
    protected $fillable = ['title','description'];

    protected static function newFactory(): Factory
    {
        return SolutionFactory::new();
    }

    public function Interventions()
    {
        return $this->hasMany(Intervention::class);
    }
}
