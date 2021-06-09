<?php

use App\Bazen;
use Illuminate\Database\Seeder;

class BazenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bazen::insert([
            'drzava'=>'Srbija',
            'grad'=> 'Beograd',
            'mesto'=> 'Tadeuša Košćuškog',
            'naziv'=> '25. maj',
            'sirina'=>'22m',
            'duzina'=>'50m',
            'dubina'=>'2.5m'
        ]);

        Bazen::insert([
            'drzava'=>'Srbija',
            'grad'=> 'Beograd',
            'mesto'=> 'Ilije Garašanina',
            'naziv'=> 'Tašmajdan',
            'sirina'=>'21m',
            'duzina'=>'50m',
            'dubina'=>'2.1m'
        ]);
    }
}
