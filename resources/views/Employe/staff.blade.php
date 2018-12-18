@extends('layouts.employe')

@section('page-content')
    <div class="example">
        <div id="app">
            <staff-page 
                :id="'{{$snd_id}}'" 
                :token="'{{Auth::user()->api_token}}'"
                :uid="'{{Auth::user()->id}}'">

            </staff-page>
        </div>
    </div>
@endsection