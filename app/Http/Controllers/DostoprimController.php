<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ExcursionRequest;
use App\Http\Requests\DostoprimRequest;
use App\Models\Dostoprim;
use App\Models\DostoprimImage;
use App\Models\ExcursDostoprim;
use Illuminate\Support\Facades\Storage;

class DostoprimController extends Controller
{
    public function showDostoprimCreateForm(){
        return view('admin.dostoprim');
    }

    public function createDostoprim(DostoprimRequest $request){
        $imgStrData = strtotime(date('Y-m-d H:i:s'));
        
        $data = [
            'title'=>$request->title,
            'address'=>$request->address,
            'time'=>$request->time,
            'complexity'=>$request->complexity,
            'type'=>$request->type,
            'distance'=>$request->distance,
            'description'=>$request->description,
            'price'=>$request->price,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude           
        ];
        $dostoprim = Dostoprim::create($data); 
        
        $dostoprim_id = $dostoprim->id;
        $images = $request->file('img');
        
        if($images != null){
        foreach($images as $img){
            if($img->getClientOriginalExtension() != 'jpg' && $img->getClientOriginalExtension() != 'png'){
                continue;
            }
            
            $origanName = $img->getClientOriginalName();
            $path=$img->storeAs('dostoprimImages',$imgStrData."_".$origanName);   
            DostoprimImage::create(['dostoprim_id'=>$dostoprim_id,'dostoprim_img'=>'http://80.78.246.59/autogid/public/storage/dostoprimImages/'.$imgStrData."_".$origanName]);        
            }
        }
        return back();
    }

    public function showDeletDostoprimPage(){    
        $dostoprims = Dostoprim::all();

        // foreach($dostoprims as $dostoprim){
        //     dump($dostoprim->title);
        //     foreach($dostoprim->dostoprimImage as $val){
        //         dump($val->dostoprim_img);
        //     }
        // }
        $arr = [
            'dostoprims'=>$dostoprims
        ];
        return view('admin.deleteDostoprim',$arr);      
          
    }

    public function deletDostoprim($id){      

        $del_images = DostoprimImage::where('dostoprim_id',$id)->get();
        $del_images_names = [];
        foreach($del_images as $val){
            $arr = explode('/',$val->dostoprim_img);
            $img_name = end($arr);
            
            if(Storage::exists('dostoprimImages/'.$img_name)){
                Storage::delete('dostoprimImages/'.$img_name);
              }
        }
        $del2 = ExcursDostoprim::where('dostoprim_id',$id)->get();
        foreach($del2 as $val){
            $deleted = ExcursDostoprim::find($val->id);
            $deleted->delete();
        }       
        $del = Dostoprim::find($id);   
        $del->delete();  

        return back();
    }

    public function deletDostoprimImg($id){
        
        $del_images = DostoprimImage::find($id);
        $arr = explode('/',$del_images->dostoprim_img);
        $img_name = end($arr);
        if(Storage::exists('dostoprimImages/'.$img_name)){
            Storage::delete('dostoprimImages/'.$img_name);
          }
        $del = DostoprimImage::find($id);   
        $del->delete();

        return back();
    }

    public function showEditDostoprimPage(Request $request){
        $dostoprim = null;
        if(isset($request->id) && $request->id!=''){
            $dostoprim = Dostoprim::find($request->id);           
        }
        $dostoprims = Dostoprim::all();      

        $arr = [
            'dostoprims' => $dostoprims,
            'dostoprim' => $dostoprim
        ];
        return view('admin.editDostoprim',$arr);
    }

    public function updateDostoprim(DostoprimRequest $request){        
        $dostoprim_id = $request->dostoprim_id;
        $title = $request->title;
        $address = $request->address;
        $time = $request->time;
        $complexity = $request->complexity;
        $type = $request->type;
        $distance = $request->distance;
        $description = $request->description;
        $price = $request->price;
        $latitude = $request->latitude;
        $longitude = $request->longitude;

        $update = Dostoprim::find($dostoprim_id); 
        $update->title = $title;
        $update->address = $address;
        $update->time = $time;
        $update->complexity = $complexity;
        $update->type = $type;
        $update->distance = $distance;
        $update->description = $description;
        $update->price = $price;
        $update->latitude = $latitude;
        $update->longitude = $longitude;
        $update->save();        
        
        $images = $request->file('img');
        if($images != null){
        foreach($images as $img){
            if($img->getClientOriginalExtension() != 'jpg' && $img->getClientOriginalExtension() != 'png'){
                continue;
            }

            $origanName = $img->getClientOriginalName();
            $path=$img->storeAs('dostoprimImages',$origanName);   
            DostoprimImage::create(['dostoprim_id'=>$dostoprim_id,'dostoprim_img'=>'http://80.78.246.59/autogid/public/storage/dostoprimImages/'.$origanName]);        
            }
        }
        return back();
    }
}
