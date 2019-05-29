<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Token;

class TokenChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(!$request->header('Authorization'))
        {  
            return response()->json(['status' => false, 'errorMessage' => 'This server could not verify that you are authorized to access the document requested.', 'errorCode' => '401'])->setStatusCode(401);  
        }  

        $token = Token::where('token', $request->header('Authorization'))->first();

        if (!$token) 
        {
            return response()->json(['status' => false, 'errorMessage' => 'Invalid token.', 'errorCode' => '403'])->setStatusCode(403); 
        }

        $request->merge(['auth' => $token]);

        return $next($request);
    }
}
