@extends('layouts.app')

@section('sidebar')
    @include('layouts.sidebar')
    
    @section('contents')
    <h2>selamat datang, {{$user -> name}}</h2>
    @endsection
@endsection



