<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bazen extends Model
{
    protected $table = "bazen";
    public $timestamps = false;

    public function termini()
    {
        return $this->hasMany(Termin::class,"id_bazen","id");
    }
}
