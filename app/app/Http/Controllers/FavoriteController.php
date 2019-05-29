<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Favorite;
use App\Models\Music;

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
    	$favorite = $request->auth->favorites()->where('music_id', $id)->first();

    	if ($favorite) 
    	{
    		$favorite->delete();
    		return response()->json(['status' => true, 'msg' => 'Unliked.']);
    	}
    	else
    	{
    		return response()->json(['status' => true, 'msg' => 'Music already unliked.']);
    	}
    }

    /**
     * Like favorite music
     *
     * @param  $id unique music id
     * @return json
     */
    public function like(Request $request, $id)
    {

        $music = Music::find($id);

        if (!$music) 
        {
            return response()->json(['status' => false, 'errorMessage' => 'Music not found.', 'errorCode' => 422])->setStatusCode(422);
        }

        $favorite = $request->auth->favorites()->where('music_id', $music->id)->first();

        if ($favorite) 
        {
            return response()->json(['status' => true, 'msg' => 'Music already liked.']);
        }
        else
        {
            Favorite::create([
                'token_id' => $request->auth->id,
                'music_id' => $music->id
            ]);

            return response()->json(['status' => true, 'msg' => 'Liked.']);
        }
    }

}
