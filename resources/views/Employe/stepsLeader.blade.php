@extends('layouts.employe')

@section('page-content')
    <div class="example">
        <div id="app">
            <project-sl 
                :id="'{{$snd_id}}'" 
                :token="'{{Auth::user()->api_token}}'"
                :uid="'{{Auth::user()->id}}'"
            >

            </project-sl>
        </div>
    </div>
@endsection