<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;

class MeController extends Controller
{
    protected $auth;

    public function __construct(JWTAuth $auth){
      $this->auth = $auth;
    }

    public function index(Request $request){
      return response()->json([
        'success' => true,
        'data' => $request->user()
      ], 200);
    }

    public function logout(){
      $this->auth = JWTAuth::invalidate();

       return response()->json([
         'success' => true
       ]);
    }
}
