<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ImagesController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $images = Image::latest()->get();
        return view('images.index', ['images' => $images]);
    }

    public function create() {
        return view('images.create');
    }
   
    public function store(Request $request) {
        $request->validate([
            'fileToUpload' => 'required|file|max:2048',
        ]);

        $fileName = "image-".time().'.'.request()->fileToUpload->getClientOriginalExtension();

        $request->fileToUpload->storeAs('images', $fileName);

        $image = new Image();

        $image->alt = $fileName;
        $image->src = "/storage/images/$fileName";

        $image->save();

        return redirect('/')->with('message', 'Image added successfully!');
    }

    public function destroy($id) {
        $image = Image::findOrFail($id);
        $image->delete();
        return redirect('/')->with('message', 'Image deleted successfully!');
    }
}