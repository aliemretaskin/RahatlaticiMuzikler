<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{

    /**
     * List token favorite musics
     *
     * @param  $token null or user token
     * @return json
     */
    public function list(Request $request)
    {
    	$favorites = $request->auth->favorites()->with(['music', 'music.categorie', 'music.artist'])->get();

    	return response()->json(['status' => true, 'favorites' => $favorites]);
    }

    /**
     * Unlike favorite music
     *
     * @param  $id unique music id
     * @return json
     */
    public function unlike(Request $request, $id)
    {
    	$favorite = $request->auth->favorites()->find($id);

    	if ($favorite) 
    	{
    		$favorite->delete();
    		return response()->json(['status' => true, 'msg' => 'Unliked.']);
    	}
    	else
    	{
    		return response()->json(['status' => true, 'msg' => 'Music allready unliked.']);
    	}
    }
}
