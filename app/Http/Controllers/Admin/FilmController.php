<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.films.index', ['films' => Film::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.films.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Film::create($request->validate([
            'title' => 'required',
            'description' => 'required'
        ]));
        return redirect()->route('admin.films.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $film)
    {
        return view('admin.films.edit', compact('film'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Film $film)
    {
        $film->update($request->validate([
            'title' => 'required',
            'description' => 'required'
        ]));
        return redirect()->route('admin.films.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        $film->delete();
        return back();
    }
}
