<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Image;
use App\Model\HeroSuperpower;

class Hero extends Model
{
    protected $table="hero";
    protected $fillable=['nickname', 'real_name', 'origin_description', 'catch_phrase', 'created_at', 'updated_at'];

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function superpowers(){
        return $this->hasMany(HeroSuperpower::class);//->with('superpower');
    }
}
