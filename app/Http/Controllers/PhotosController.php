<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Photo;
use App\Models\Album;

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

        return redirect(app()->getLocale().'/albums/'. $request->input('albumId'))->with('success', 'Photo Uploaded Successfully!');
    }
    public function show($language, $id){

        $photo = Photo::find($id);

        return view('photos.show')->with('photo', $photo);
    }

    // public function destroy(Request $id){
    //     $photo = Photo::find($id);
    //     // dd($photo);
    //     dd($request->all());
        
    //     // if (Storage::delete('/storage/albums/'.$photo->album_id.'/'.$photo->photo)){
    //     // $photo->delete();

    //     // }
    // }
    public function destroy(Request $request) {
        $photo = Photo::find($request->id);

        if(\File::exists(public_path('/storage/albums/'.$photo->album_id.'/'.$photo->photo))){
            \File::delete(public_path('/storage/albums/'.$photo->album_id.'/'.$photo->photo));
            Photo::find($request->id)->delete();
            return redirect('/en')->with('success', 'Photo Deleted Successfully');
            // echo 123; 
        }   
        // dd($photo);
        // $photo->delete();
        // if (Storage::delete('/storage/albums/'.$photo->album_id.'/'.$photo->photo)){
        // }
    }
}