<?php

namespace App\Http\Controllers;

use App\Prijava;
use App\Termin;
use Illuminate\Http\Request;

class PrijavaController extends Controller
{
    public function createPrijava(Request $request)
    {
        $termin = Termin::find($request->id_termin);
        $prijava = Prijava::where('telefon', $request->telefon)->first();
        if ($prijava) {
            return response()->json(['obavestenje' => 'Vec postoji Vasa prijava. Sada cemo Vam promeniti prijavljeni termin.', 'prijava_id_termin' => $prijava->id_termin, 'prijava_id' => $prijava->id, 'postoji_prijava' => true]);
        }
        if ($termin->imaMesta()) {
            if (Prijava::insert(
                [
                    'ime_prezime' => $request->ime_prezime,
                    'telefon' => $request->telefon,
                    'vestina_plivanja' => $request->vestina_plivanja,
                    'datum_prijave' => $request->datum_prijave,
                    'id_termin' => $request->id_termin,
                ]
            )) {
                $termin->decrement('slobodna_mesta');
                return response()->json(['obavestenje' => 'Cestitam na dodavanju prijave. Vidimo se sutra u zakazano vreme.', 'postoji_prijava' => false]);
            }
            return response()->json(['obavestenje' => 'Doslo je do greske prilikom prijavljivanja.', 'postoji_prijava' => false]);
        }
        return response()->json(['obavestenje' => 'Nema dovoljno mesta na ovom terminu. Izaberite drugi. Hvala!', 'postoji_prijava' => false]);
    }

    public function updatePrijava($id, Request $request)
    {
        if($request->bivsiTermin === $request->id_termin){
            return response()->json(['obavestenje' => 'Vec ste prijavljeni za ovaj termin.']);

        }

        Termin::find($request->bivsiTermin)->increment('slobodna_mesta');

        $termin = Termin::find($request->id_termin);
        if ($termin->imaMesta()) {
            if (Prijava::where('id', $id)->update(
                [
                    'id_termin' => $request->id_termin,
                ]
            )) {
                $termin->decrement('slobodna_mesta');
                return response()->json(['obavestenje' => 'Uspesno ste promenili termin.']);
            }
            return response()->json(['obavestenje' => 'Doslo je do greske prilikom promene termina.']);
        }
        return response()->json(['obavestenje' => 'Nema dovoljno mesta na ovom terminu. Izaberite drugi. Hvala!']);
    }
}
