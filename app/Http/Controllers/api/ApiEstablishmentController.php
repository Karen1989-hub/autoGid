<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Establishment;

class ApiEstablishmentController extends Controller
{
    public function getEstablishments(){
        $establishments = Establishment::all();

        return response()->json([
            'message' => 'success',
            'data' => [
                'establishments' => $establishments, 
            ]           
        ]);
    }
}
