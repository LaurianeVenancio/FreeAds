<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class AnnonceController extends Controller
{
    public function index()
    {
        $annonces = Annonce::all();
        return view('annonces.index',  compact('annonces'));
    }

    public function create()
    {
        return view ('annonces.create');
    }

    public function store(Request $request)
    {
        $cover = $request->file('photo');
        $extension = $cover->getClientOriginalExtension();
        Storage::disk('public')->put($cover->getFilename().'.'.$extension, File::get($cover));

        Annonce::create([
            'user_id' => $request->user()->id,
            'title' => $request['title'],
            'description' => $request['description'],
            'prix' => $request['prix'],
            'image' => $cover->getFilename() . '.' . $extension,
        ]);
        $annonces = Annonce::all();
        return view ('annonces.index', compact('annonces'));
    }

    public function show($id)
    {
        $mesannonces = Annonce::where('user_id', '=', $id)->get();
        return view('annonces.show',  compact('mesannonces'));
    }

    public function edit($id)
    {
        $annonce = Annonce::where('id', '=', $id)->firstOrFail();
        return view ('annonces.edit',compact('annonce'));
    }

    public function update(Request $request, $id)
    {
        $annonce = Annonce::where('id', $id)->firstOrFail();
        $annonce->update([
            'title' => $request->title,
            'description' => $request->description,
            'prix' => $request->prix,
        ]);        
        $annonces = Annonce::all();
        return view('annonces.index', compact('annonce', 'annonces'));
    }
}
