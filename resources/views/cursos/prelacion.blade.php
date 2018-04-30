@extends('layouts.Principal')

@section('content')
    probando
    @foreach($cursoss->coursePrelacion as $cursoss)
        <p> prueba {{$cursoss->course}}</p>
    @endforeach
    {{--<pre-course></pre-course>--}}


    @endsection