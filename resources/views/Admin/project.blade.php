@extends('layouts.admin')

@section('header','Project')
@section('title','')
@section('content')
  
    <div class="example">
      <div id="app">
        <project-admin :token = "'{{Auth::user()->api_token}}'">

        </project-admin>
      </div>
    </div>
@endsection
