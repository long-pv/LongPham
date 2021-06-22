@extends('errors::minimal') 

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found')) // gọi sang bên minimal để thông báo
