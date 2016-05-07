<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'] ;
    
}
