<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    use HasFactory;

    protected $fillable=['name','date','status','image','client_id','type_interventions_id','solution_id'];

    public static function boot()
    {
        parent::boot();

        static::creating(function($model){
            $model->user_id = auth()->user()->id;
        });
    }

    public function scopeOnline()
    {
        $interventions = Intervention::where('status',1)
        ->where('user_id',auth()->user()->id)
        ->get();

        return $interventions;
    }


    public function scopeOffline()
    {
        $interventions = Intervention::where('status',0)
        ->where('user_id',auth()->user()->id)
        ->get();

        return $interventions;
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }

    public function TypeIntervention()
    {
        return $this->belongsTo(TypeIntervention::class);
    }

    public function Solution()
    {
        return $this->belongsTo(Solution::class);
    }
}
