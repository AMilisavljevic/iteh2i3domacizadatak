<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prijava extends Model
{
    protected $table = "prijava";
    public $timestamps = false;

    public function termin()
    {
        return $this->belongsTo(Termin::class,"id_termin","id");
    }
}
