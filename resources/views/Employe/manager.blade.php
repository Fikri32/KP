@extends('layouts.employe')

@section('page-content')
    <div class="example">
        <div id="app">
            <project-manager 
            :token = "'{{Auth::user()->api_token}}'" 
            :id = "{{$snd_id}}"
            :uname = "'{{Auth::user()->name}}'">

            </project-manager>
        </div>
    </div>
@endsection
