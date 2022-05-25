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
        /**
     * @OA\Get(
     * path="/autogid/public/api/getEstablishment",
     * summary="",
     * description="Get establishment",
     * operationId="authLogin",
     * tags={"Establishment"},
     * @OA\RequestBody(
     *    required=false,
     *    description="Has no parameters",   
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Success get establishments",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Success get establishments"),      
     *        )
     *     )
     * )
     */
    public function getEstablishment(){
        $establishments = Establishment::all();

        return response()->json([
            'success' => true,
            'data' => [
                'establishments' => $establishments, 
            ],
            'message' => 'Success get establishments'
        ]);
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

    
}
