@extends('layouts.app')

@section('title', 'Edit Film')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Film</h1>

    <form action="{{ route('admin.films.update', $film) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block font-medium">Judul Film</label>
            <input type="text" name="title" id="title" class="w-full border rounded px-3 py-2"
                value="{{ old('title', $film->title) }}" required>
            @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="description" class="block font-medium">Deskripsi</label>
            <textarea name="description" id="description" rows="5" class="w-full border rounded px-3 py-2"
                required>{{ old('description', $film->description) }}</textarea>
            @error('description') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Update
        </button>
    </form>
@endsection