@extends('layouts.classroom')

@section('body-class', 'classroom-lesson-page')

@section('content')
  <classroom-lesson :course="{{$course}}" :lesson="{{$lesson}}"></classroom-lesson>
@endsection