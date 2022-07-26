@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@if(Route::currentRouteName() == 'satici.satis')
    @section('message', $exception->getMessage())
@else
    @section('message', __('Not Found'))
@endif
