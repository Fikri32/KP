@extends('layouts.admin')

@section('content')
    <div class="example">
      <div id="app">
            <client-company :token="'{{Auth::user()->api_token}}'">
                
            </client-company>
      </div>
    </div>
@endsection