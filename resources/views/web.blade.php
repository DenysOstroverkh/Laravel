@extends('layouts.web')

@section('body-class', 'scan-index-page')
{{-- @section('container-class', 'm-x-100') --}}

@section('content')
  <vue-page-transition name="fade-in-up">
    <router-view></router-view>
  </vue-page-transition>
  {{-- <web-index></web-index> --}}
@endsection