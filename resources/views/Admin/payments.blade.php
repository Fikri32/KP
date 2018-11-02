@extends('layouts.admin')

@section('content')
    
    <div class="example">
      <div id="app">
        <payment :token="'{{Auth::user()->api_token}}'" :id="'{{$snd_id}}'">

        </payment>
      </div>
    </div>
@endsection