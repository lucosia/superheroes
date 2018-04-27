<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table="image";
    protected $fillable=['path', 'hero_id', 'created_at', 'updated_at'];

}
