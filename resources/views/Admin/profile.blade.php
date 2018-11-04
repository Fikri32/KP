@extends('layouts.admin')

@section('content')
    
    <div class="example">
        <div id="app">
           <prof-admin :token="'{{Auth::user()->api_token}}'" :user="'{{$user}}'">

           </prof-admin>
        </div>
    </div>
@endsection