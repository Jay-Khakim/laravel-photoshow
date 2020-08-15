<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;

class PhotosController extends Controller
{

    public function create($language, $albumId){
        return view('photos.create')->with('albumId', $albumId); 
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'photo' => 'required|image',

        ]);
        $filenameWithExtention = $request->file('photo')->getClientOriginalName();
        $extention = $request->file('photo')->getClientOriginalExtension();
        $filename = pathinfo($filenameWithExtention, PATHINFO_FILENAME);
        $filenameToStore = $filename.'-'.time().'.'.$extention;

        $path = $request->file('photo')->storeAs('public/albums/'. $request->input('albumId'), $filenameToStore);
        // dd($path);

        $photo =new Photo();
        $photo->description = $request->input('description');
        $photo->title = $request->input('title');
        $photo->photo = $filenameToStore;
        $photo->album_id = $request->input('albumId');
        $photo->size = $request->file('photo')->getSize();
        $photo->save();

        return redirect('/albums/'. $request->input('albumId'))->with('success', 'Photo Uploaded Successfully!');
    }
}
