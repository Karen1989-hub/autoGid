<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Establishment;
use App\Http\Requests\EstablishmentsRequest;
use Illuminate\Support\Facades\Storage;

class EstablishmentController extends Controller
{
    public function showAddEstablishmentPage(){
        return view('admin.addEstablishment');
    }    
    

    public function addEstablishment(EstablishmentsRequest $request){        
        $imgStrData = strtotime(date('Y-m-d H:i:s'));
        $data = [
            'title'=>$request->title,
            'address'=>$request->address,
            'distance'=>$request->distance,
            'time'=>$request->time,   
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
            'image'=>'http://80.78.246.59/autogid/public/storage/establishmentImages/'.$imgStrData."_".$request->file('img')->getClientOriginalName()           
        ];     
        
        $images = $request->file('img');        
        $origanName = $images->getClientOriginalName();
        $path=$images->storeAs('establishmentImages',$imgStrData."_".$origanName);   
        $dostoprim = Establishment::create($data);    
        
        return back();
    }

    public function showDeleteEstablishmentPage(){
        $establishments = Establishment::all();
        return view('admin.deleteEstablishment',compact('establishments'));
    }

    public function deleteEstablishment(Request $request){
        $id = $request->establish_id;
        $delete = Establishment::find($id);
        $imgNameArr = explode('/',$delete->image);
        $imgName = end($imgNameArr);
       
        if(Storage::exists('establishmentImages/'.$imgName)){        
            Storage::delete('establishmentImages/'.$imgName);
          }
        $delete->delete();

        return back();
    }

    public function showEditEstablishmentPage(Request $request){
        $establishment = null;
        $id = $request->id;
        if(isset($request->id) && $request->id!=''){
            $establishment = Establishment::find($request->id);           
        }
        
        $establishments = Establishment::all();
        return view('admin.editEstablishment',compact(['establishments','establishment']));
    }

    public function updateEstablishment(Request $request){        
        $establishment_id = $request->establishment_id;
        $img = $request->file('img');
        $imgName = null;
        $imgStrData = null;
        if($img != null){
            $imgName = $img->getClientOriginalName();                         
        }

        $update = Establishment::find($establishment_id);  
        $update->title = $request->title;
        $update->address = $request->address;
        $update->distance = $request->distance;
        $update->time = $request->time;
        $delImageNameNotFilter = explode('/',$update->image);
        $delImageName = end($delImageNameNotFilter);
    
        if($imgName != null){
            if(Storage::exists('establishmentImages/'.$delImageName)){
                Storage::delete('establishmentImages/'.$delImageName);
            } 
            $imgStrData = strtotime(date('Y-m-d H:i:s'))."_".$imgName;

            $path=$request->file('img')->storeAs('establishmentImages',$imgStrData);  
            $update->image = 'http://80.78.246.59/autogid/public/storage/establishmentImages/'.$imgStrData;          
        } 

        $update->latitude = $request->latitude;
        $update->longitude = $request->longitude;
        $update->save();
        return back();
    }

    public function showCheckEstablishment(){
        return view('admin.test.checkEstablishmentInMap');
    }

    
}
