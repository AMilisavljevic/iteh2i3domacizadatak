@extends('layout.glavni')

@section('page-content')

    <div class="d-flex">
        <div class="col">
            <h3> {{ $bazen->naziv }} |
                {{ $bazen->grad }},
                {{ $bazen->mesto }}</h3>
        </div>
        <div class="col">
            <h3>[Širina: {{ $bazen->sirina }}]
            [Dužina: {{ $bazen->duzina }}]
             [Dubina: {{ $bazen->dubina }}]
            </h3>
        </div>
    </div>


    {{-- termini vezani za bazen --}}
    <div id="termini" data-id_bazen="{{ $bazen->id }}"></div>
@endsection
