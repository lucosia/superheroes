<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Superpower;

class HeroSuperpower extends Model
{
    protected $table="hero_superpower";
    protected $fillable=['hero_id','superpower_id','created_at', 'updated_at'];


    public function superpower(){
        return $this->belongsTo(Superpower::class);
    }
}
