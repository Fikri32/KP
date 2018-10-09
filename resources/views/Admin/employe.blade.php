@extends('layouts.admin')

@section('content')
    <div class="example">
      <div id="app">
          <user :token = "'{{Auth::user()->api_token}}'"> </user>
      </div>
    </div>
@endsection