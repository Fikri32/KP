@extends('layouts.admin')

@section('content')
    
    <div class="example">
      <div id="app">
        <setting-declar :token = "'{{Auth::user()->api_token}}'">
            
        </setting-declar>
      </div>
    </div>

@endsection