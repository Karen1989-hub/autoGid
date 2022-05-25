<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use Illuminate\support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\Registrmail;
use App\Mail\Restorekey;

class RegistrationController extends Controller
{

    /**
 * @OA\Post(
 * path="/registration",
 * summary="",
 * description="Registration by phone,email,password,password_confirm",
 * operationId="registration",
 * tags={"Registration"},
 * @OA\RequestBody(
 *    required=true,
 *    description="Pass user credentials",
 *    @OA\JsonContent(
 *       required={"phone","email","password","password_confirm"},
 *       @OA\Property(property="phone", type="string", format="phone", example="098121212"),
 *       @OA\Property(property="email", type="string", format="email", example="user1@mail.com"),
 *       @OA\Property(property="password", type="string", format="password", example="PassWord12345"),
 *       @OA\Property(property="password_confirm", type="string", format="password", example="PassWord12345"),
 *    ),
 * ),
 * @OA\Response(
 *    response=401,
 *    description="Validation error",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Validation error")
 *        )
 *     )
 * )
 */

    public function registr(Request $request){
        //return $request->all();
        $validator = Validator::make($request->all(), [
            'phone' => 'required|unique:users|integer',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        if ($validator->fails()){
            $errors = $validator->errors();
            return response()->json([
                'message' => 'validation error',
                'error' => $errors
            ], 401);
        } else {           
            $data = [
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => $request->password
            ];
            $phone = $request->phone;
            $email = $request->email;
            $passwordNoHash = $request->password;
            $password_confirm = $request->password_confirm;
            if($passwordNoHash != $password_confirm){
                return response()->json([
                    'message'=>"confirm password error",
                ],401);
            }
            $remember_token = rand(100000,999999);
            $password = \Hash::make($request->password);
            Mail::to($email)->send(new Registrmail($remember_token));
            $user = User::create(['phone'=>$phone,'email'=>$email,'password'=>$password,'remember_token'=>$remember_token]);
            
                return response()->json([
                    'success'=>true,
                    'data'=>[
                        'userId' => $user->id,
                        'rememberToken'=>$remember_token
                    ],
                    'message' => 'success'
                ],200);
        }
    }
    
    public function registrautoris(Request $request){
        
        $remember_token = $request->remember_token;
        $userId = $request->userId;
        $user = User::find($userId);
        if($user->remember_token == $remember_token){
            $update = User::find($userId);
            $update->remember_token = 'autorised';
            $update->save();
            return response()->json([
                'message'=>'success autorisation'
            ],200);
        } else {
            return response()->json([
                'message'=>'no corect key'
            ],401);
        }
    }
    
    public function login(Request $request){
        //return $request->all();

        $validator = Validator::make($request->all(), [
            'phone' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors);
        } else {            
            $data = [
                'phone' => $request->phone,
                'password' => $request->password
            ];
            if(Auth::attempt($data)){
                $token = Auth::user()->createToken('API Token')->accessToken;
                $remember_token = Auth::user()->remember_token;
                $autorised = false;
                if($remember_token == "autorised"){
                  $autorised = true; 
                }
                
                return response()->json([
                    'message'=>'user login',
                    'autorised'=>$autorised,
                    'user'=>Auth::user(),
                    'token'=>$token,
                ],200);
            } else {
                return response()->json([
                    'message'=>'no corect login or password'
                ],402);
            }
          }
        }
        
    //reset password    
    public function restorePassword(Request $request){
        $email = $request->email;
        $user = User::where('email',$email)->first();
        if($user->email == $email){
            $remember_token = rand(100000,999999);
            Mail::to($email)->send(new Restorekey($remember_token));
            
            $update = User::find($user->id);
            $update->remember_token = $remember_token;
            $update->save();
            
            return response()->json([
                'message'=>'success, remember key sended your email',
                'user_id'=>$user->id
                ],200);
        } else {
            return response()->json([
                'message'=>'no corect mail'
                ],401);
        }
    }
    
    public function getRestorKey(Request $request){
        $user_id = $request->user_id;
        $number = $request->number;
        
        $user = User::find($user_id);
        if($user->remember_token == $number){
            $update = User::find($user_id);
            $update->remember_token = 'autorised';
            $update->save();
            return response()->json([
                'message' => 'success'
                ],200);
        } else {
            return response()->json([
                'message' => 'no correct remember key'
                ],401);
        }
    }
    
    public function updateUserPassword(Request $request){
        $password = $request->new_password;
        $confirm_password = $request->confirm_password;
        $user_id = $request->user_id;
        if($password != $confirm_password){
            return response()->json([
                'message'=>'password doesnt look like confirm_password'
                ],401);
        } else {
            $hash_password = \Hash::make($password);
            $update = User::find($user_id);
            $update->password = $hash_password;
            $update->save();
            return response()->json([
                'message'=>'password chenged'
                ],200);
        }
    }
    
    public function sendKeyAgain(Request $request){
        $user_id = $request->user_id;
        $user = User::find($user_id);
        $mail = $user->email;
        $remember_token = rand(100000,999999);
        Mail::to($mail)->send(new Restorekey($remember_token));
        
        $update = User::find($user_id);
        $update->remember_token = $remember_token;
        $update->save();
        
        return response()->json([
            'message'=>'success'
            ],200);
    }
        
}
