<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Auteur extends Model
{
   public $timestamps = false;
    protected $fillable = ['name'] ;

    public function creer($name)
    {
        $this->name = $name ;
    }

    public function lister() {
        return Auteur::all();
    }
}
