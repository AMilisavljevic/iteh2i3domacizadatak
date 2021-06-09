<?php

use App\Termin;
use Illuminate\Database\Seeder;

class TerminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Termin::insert([
            'opis' => 'Ovaj termin je namenjen početnicima.',
            'slobodna_mesta' => rand(10, 20),
            'pocetak' => '08:00',
            'kraj' => '10:00',
            'id_bazen' => 1
        ]);
        Termin::insert([
            'opis' => 'Ako Vaše dete želi da krene u školu plivanja, ovaj termin je za Vas.',
            'slobodna_mesta' => rand(10, 20),
            'pocetak' => '12:00',
            'kraj' => '14:00',
            'id_bazen' => 1
        ]);
        Termin::insert([
            'opis' => 'Termin koji je namenjen za relaksaciju i plivanje za osobe ne žele profesionalno nadmetanje.',
            'slobodna_mesta' => rand(10, 20),
            'pocetak' => '16:00',
            'kraj' => '18:00',
            'id_bazen' => 1
        ]);
        Termin::insert([
            'opis' => 'Izaberite ovaj termin jedino ako ste veoma sigurni u Vašu fizičku spremu, u pitanju su naporni treninzi.',
            'slobodna_mesta' => rand(10, 20),
            'pocetak' => '20:00',
            'kraj' => '22:00',
            'id_bazen' => 1
        ]);
        
        Termin::insert([
            'opis' => 'Ovaj termin je namenjen početnicima.',
            'slobodna_mesta' => rand(10, 20),
            'pocetak' => '08:00',
            'kraj' => '10:00',
            'id_bazen' => 2
        ]);
        Termin::insert([
            'opis' => 'Ako Vaše dete želi da krene u školu plivanja, ovaj termin je za Vas.',
            'slobodna_mesta' => rand(10, 20),
            'pocetak' => '12:00',
            'kraj' => '14:00',
            'id_bazen' => 2
        ]);
        Termin::insert([
            'opis' => 'Termin koji je namenjen za relaksaciju i plivanje za osobe ne žele profesionalno nadmetanje.',
            'slobodna_mesta' => rand(10, 20),
            'pocetak' => '16:00',
            'kraj' => '18:00',
            'id_bazen' => 2
        ]);
        Termin::insert([
            'opis' => 'Izaberite ovaj termin jedino ako ste veoma sigurni u Vašu fizičku spremu, u pitanju su naporni treninzi.',
            'slobodna_mesta' => rand(10, 20),
            'pocetak' => '20:00',
            'kraj' => '22:00',
            'id_bazen' => 2
        ]);
 
    }
}
