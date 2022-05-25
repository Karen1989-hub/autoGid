<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ExcursionRequest;
use App\Models\Sight;
use Illuminate\Support\Facades\Storage;
use App\Models\Dostoprim;
use App\Models\ExcursDostoprim;


class ExcursionController extends Controller
{
    public function createExcursion(ExcursionRequest $request){          
               
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
            'img'=>"http://80.78.246.59/autogid/public/storage/excursianImages/".$imgStrData."_".$request->file('img')->getClientOriginalName()            
        ];
        $origanName = $request->file('img')->getClientOriginalName();

        $path=$request->file('img')->storeAs('excursianImages',$imgStrData."_".$origanName);     
        Sight::create($data);   

        return back();  
    }
   
    public function getExcursions(){
        $excursions = Sight::all();       

        return response()->json([
            "excursions"=>$excursions            
        ],200);
    }

    public function showAddDostoprimToExcursPage(Request $request){
        $id = null;
        if(isset($request->id) && $request->id!=null){            
          $id = $request->id;          
        }        
        
        $excursions = null;
        if($id != null){
            $excursions = Sight::where('id',$id)->get(); 
        }
        
        $dostoprims = Dostoprim::all();   
        $excursions_list = Sight::all();    

        $arr = [
            'id'=>$id,
            'excursions_list' => $excursions_list,
            'excursions' => $excursions,
            'dostoprims' => $dostoprims
        ];
        return view('admin.addDostoprimToExcurs',$arr);
    }

    public function showEditExcursionPage(){
        $excursions = Sight::all();
        return view('admin.editExcursion',compact('excursions'));
    }

    public function showEditExcursById($id){
        $excursion = Sight::find($id);
        $dostoprims = Dostoprim::all();
        
        return view('admin.editExcursionById',compact(['id','excursion','dostoprims']));
    }

    public function updateExcursion(ExcursionRequest $request){       
        
        $excursion_id = $request->excursion_id;
        $title = $request->title;
        $address = $request->address;
        $time = $request->time;
        $complexity = $request->complexity;
        $type = $request->type;
        $distance = $request->distance;
        $description = $request->description;
        $price = $request->price;
        $img = $request->img;

        $imgName = null;
        $imgStrData = null;
        if($img != null){
            $imgName = $img->getClientOriginalName();                         
        }
                     
        $update = Sight::find($excursion_id);
        $delImage = explode("/",$update->img);
        $delImageName = end($delImage);
         
        if($imgName != null){
            $imgStrData = strtotime(date('Y-m-d H:i:s'))."_".$imgName;
            $path=$request->file('img')->storeAs('excursianImages',$imgStrData);
            if(Storage::exists('excursianImages/'.$delImageName)){
                Storage::delete('excursianImages/'.$delImageName);
            } 
        }        
        
        $update->title = $title;
        $update->address = $address;
        $update->time = $time;
        $update->complexity = $complexity;
        $update->type = $type;
        $update->distance = $distance;
        $update->description = $description;
        $update->price = $price;
        if($imgName != null){
        $update->img = "http://80.78.246.59/autogid/public/storage/excursianImages/".$imgStrData;
        }
        $update->save();
        
        return back();
        //return $request->all();
    }

    public function deleteExcursion($id){
        
        $del1 = ExcursDostoprim::where('sight_id',$id)->get();
        if($del1 != null && count($del1)){
            foreach($del1 as $val){
                $val->delete();
            }
        }        

        $del2 = Sight::find($id);
        $arr = explode('/',$del2->img);
        $imgName = end($arr);
        if(Storage::exists('excursianImages/'.$imgName)){
            Storage::delete('excursianImages/'.$imgName);
          }
        $del2->delete();
        return back();
    }

    public function addDostoprimToExcurs(Request $request){
        return $request->all();
    }

    public function addDostoprimRilation(Request $request){
        $excurs_id = $request->excurs_id;
        $dostoprim_id = $request->dostoprim_id;
        
        ExcursDostoprim::create(['sight_id'=>$excurs_id,'dostoprim_id'=>$dostoprim_id]);
        return back();
    }

    public function deleteDostoprimRilation($excurs_id,$dostoprim_id){       

        $obj = ExcursDostoprim::where('sight_id',$excurs_id)->where('dostoprim_id',$dostoprim_id)->first();
        $obj->delete();
        return back();
        //$deleted = ExcursDostoprim::find($obj->id);
    }
}
