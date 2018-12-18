@extends('layouts.employe')

@section('page-content')
    <div class="example">
        <div id="app">
            <dashboard-staff  
            :token = "'{{Auth::user()->api_token}}'" uname="{{Auth::user()->name}}">
                
            </dashboard-staff>
        </div>
    </div>
@endsection
