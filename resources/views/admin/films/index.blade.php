@extends('layouts.app')

@section('title', 'Daftar Film')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Daftar Film</h1>
    <a href="{{ route('admin.films.create') }}" class="bg-blue-500 text-white px-4 py-2">Tambah Film</a>
    <ul class="mt-4">
        @foreach ($films as $film)
            <li>{{ $film->title }} -
                <a href="{{ route('admin.films.edit', $film) }}">Edit</a> |
                <form method="POST" action="{{ route('admin.films.destroy', $film) }}" class="inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Yakin hapus?')" class="text-red-500">Hapus</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection