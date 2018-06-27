@extends('layouts.Principal')

@section('content')
    <courses></courses>
    {{var_dump($prela)}}
    @foreach($prela as $prelaciones)

    @endforeach
    @endsection


