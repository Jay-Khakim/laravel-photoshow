<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotosController extends Controller
{
    public function index(){
        $albums =Album::get();
        return view('albums.index')->with('albums', $albums);
    }
    public function create(){
        return view('albums.create'); 
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'cover-image' => 'required|image',

        ]);
        $filenameWithExtention = $request->file('cover-image')->getClientOriginalName();
        $extention = $request->file('cover-image')->getClientOriginalExtension();
        $filename = pathinfo($filenameWithExtention, PATHINFO_FILENAME);
        $filenameToStore = $filename.'-'.time().'.'.$extention;

        $path = $request->file('cover-image')->storeAs('public/album_covers', $filenameToStore);
        // dd($path);

        $album =new Album();
        $album->description = $request->input('description');
        $album->name = $request->input('name');
        $album->cover_image = $filenameToStore;
        $album->save();

        return redirect('/albums')->with('success', 'Album Created Successfully!');
    }
}
