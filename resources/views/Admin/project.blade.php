@extends('layouts.admin')

@section('header','Project')
@section('title','')
@section('content')
  
    <div class="example">
      <div id="app">
          <project v-bind:token = "'{{Auth::user()->api_token}}'">
              
          </project>
      </div>
    </div>
@endsection
