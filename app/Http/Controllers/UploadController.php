<?php

namespace App\Http\Controllers;

use App\UploadImage;


use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{
    public function index(){
        $images = UploadImage::latest()->get();
        return view('welcome',compact('images'));
    }
    public function store(){
        if(! is_dir(public_path('/images'))){
            mkdir(public_path('/images'), 0777);
        }
        $images = Collection::wrap(request()->file('file'));
      $images->each(function ($image) {
          $basename = Str::random();
          $original = $basename.'.'.$image->getClientOriginalExtension();
          $thumnail = $basename.'_thumb.'.$image->getclientOriginalExtension();

         Image::make($image)->fit('250','250')->save(public_path('/images/'.$thumnail));
         $image->move(public_path('/images'),$original);
          UploadImage::create([
              'original'=> '/images/'.$original,
              'thumbnail'=> '/images/'.$thumnail,

          ]);
      });


    }

    public function destroy(UploadImage $uploadimage){
//        dd($uploadimage->original);

        File::delete([
           public_path($uploadimage->original),
           public_path($uploadimage->thumbnail),
        ]);
        $uploadimage->delete();
        return redirect()->back();
    }


}
