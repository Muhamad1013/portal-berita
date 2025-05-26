@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <h1>Dashboard Admin</h1>
    <p>Halo, {{ auth()->user()->name }} ({{ auth()->user()->role }})</p>
@endsection