<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Token;

class TokenController extends Controller
{

    /**
     * Create a new user token
     *
     * @param  $token null or user token
     * @return json
     */
    public function generateToken($token = null)
    {
    	if (!$token)
    	{ 
    		$token = str_random(60);
    		Token::create(['token' => $token]);
    	}
    	
    	return response()->json(['status' => true, 'version' => env('APP_VERSION'), 'token' => $token, 'language' => 'tr']);
    }
}
