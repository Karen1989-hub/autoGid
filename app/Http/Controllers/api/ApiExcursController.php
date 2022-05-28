<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sight;

class ApiExcursController extends Controller
{
    public function getExcurs(){
        $excursion = Sight::all();
        return response()->json([
            'message'=>'success',
            'data'=>[
                'excursion' => $excursion
            ],

        ]);
    }

    /**
 * @OA\Post(
 * path="/getDostoprimByExcursId",
 * summary="",
 * description="get dostoprims by excursion id",
 * operationId="getDostoprimByExcursId",
 * tags={"Excursion"},
 * @OA\RequestBody(
 *    required=true,
 *    description="Pass user credentials",
 *    @OA\JsonContent(
 *       required={"excursion_id"},
 *       @OA\Property(property="excursion_id", type="integer", format="id", example="12")    
 *    ),
 * ),
 * @OA\Response(
 *    response=422,
 *    description="Wrong credentials response",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Sorry, wrong email address or password. Please try again")
 *        )
 *     )
 * )
 */
    public function getDostoprimByExcursId(Request $request){
        $excursion_id = $request->excursion_id;
        $excursion = Sight::find($excursion_id);
        $dostoprim = $excursion->dostoprim;       
       
        return response()->json([
            'message'=>'success',
            'data'=>[
                'dostoprim' => $dostoprim
            ],

        ]);
    }
}
