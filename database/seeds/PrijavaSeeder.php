<?php

use App\Prijava;
use App\Termin;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PrijavaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 0; $i < 4; $i++) {
            $id_termin = rand(1, 8);

            $termin = Termin::find($id_termin);
            if ($termin->imaMesta()) {
                $termin->decrement('slobodna_mesta');
                Prijava::insert(
                    [
                        'ime_prezime' => Str::random(rand(5, 9)) . ' ' . Str::random(rand(5, 9)),
                        'telefon' => '06' . rand(0, 9999999),
                        'id_termin' => $id_termin,
                        'vestina_plivanja' => Str::random(5),
                        'datum_prijave' => Carbon::today()
                    ]
                );
            }
        }
    }

}
