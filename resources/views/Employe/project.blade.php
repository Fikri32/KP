@extends('layouts.employe')

@section('page-content')
<div class="example">
  
  <div id="app">
        <pspa-app :token = "'{{Auth::user()->api_token}}'" :name ="'{{Auth::user()->name}}'"> 

        </pspa-app>
  </div>
</div>
@endsection
