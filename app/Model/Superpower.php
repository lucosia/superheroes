<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Superpower extends Model
{
    protected $table="superpower";
    protected $fillable=['description', 'created_at', 'updated_at'];



}
