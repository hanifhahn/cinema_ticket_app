@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    <h1 class="text-2xl font-bold">Dashboard Admin</h1>
    <a href="{{ route('admin.films.index') }}">Kelola Film</a>
@endsection