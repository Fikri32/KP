@extends('layouts.employe')

@section('page-content')
<div class="example">
  <div id="app">
        <project-staff :token = "'{{Auth::user()->api_token}}'" uname="{{Auth::user()->name}}">

        </project-staff>
  </div>
</div>
@endsection
