@extends('layouts.app')

@php use Illuminate\Support\Str; @endphp

@section('title', 'Kelola Film')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Daftar Film</h1>
        <a href="{{ route('admin.films.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            + Tambah Film
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full table-auto border-collapse">
        <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">Judul</th>
                <th class="border p-2">Deskripsi</th>
                <th class="border p-2 w-48">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($films as $film)
                <tr class="border-b">
                    <td class="border p-2">{{ $film->title }}</td>
                    <td class="border p-2">{{ Str::limit($film->description, 60) }}</td>
                    <td class="border p-2 space-x-2">
                        <a href="{{ route('admin.films.edit', $film) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('admin.films.destroy', $film) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus film ini?')" class="text-red-600 hover:underline">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center p-4">Tidak ada film.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection