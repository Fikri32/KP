@extends('layouts.admin')

@section('content')
    
    <div class="example">
      <div id="app">
        <setting-project :token = "'{{Auth::user()->api_token}}'" :id = "'{{$get_ids}}'">

        </setting-project>
      </div>
    </div>
@endsection