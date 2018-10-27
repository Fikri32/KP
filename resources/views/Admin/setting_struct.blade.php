@extends('layouts.admin')

@section('content')
    
    <div class="example">
      <div id="app">
        <setting-struct :id = "'{{$data_id}}'" :token="'{{Auth::user()->api_token}}'">
            
        </setting-struct>
      </div>
    </div>

@endsection