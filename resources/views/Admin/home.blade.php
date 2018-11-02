@extends('layouts.admin')

@section('content')
    <div class="example">
        <div id="app">
            <dashboard-admin :token="'{{Auth::user()->api_token}}'">
                
            </dashboard-admin>
        </div>
    </div>
@endsection
