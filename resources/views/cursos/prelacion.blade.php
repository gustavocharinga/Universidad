@extends('layouts.Principal')

@section('content')
    probando
    <br>
    {{$cursoss->course}} yo prelo
    @foreach($cursoss->coursePrelo as $cursosas)
        <p> b) creditos: {{$cursosas->creditos}}  Materia: {{$cursosas->course}}</p>
    @endforeach
    <br>
    me prela
    @foreach($cursoss->coursePrelacion as $cursoses)
        <p> a) creditos: {{$cursoses->creditos}} Materia: {{$cursoses->course}}</p>
    @endforeach

    <pre-course :prela="{{$cursoss}}"></pre-course>


    @endsection