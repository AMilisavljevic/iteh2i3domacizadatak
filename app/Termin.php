<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Termin extends Model
{
    protected $table = "termin";
    public $timestamps = false;

    public function bazen()
    {
        return $this->belongsTo(Bazen::class, "id_bazen", "id");
    }

    public function prijave()
    {
        return $this->hasMany(Prijava::class, "id_termin", "id");
    }

    public function imaMesta()
    {
        if ($this->slobodna_mesta > 0)
            return true;

        return false;
    }
}
