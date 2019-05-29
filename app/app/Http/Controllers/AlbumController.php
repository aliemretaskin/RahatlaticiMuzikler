<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categorie;

class AlbumController extends Controller
{

    /**
     * List Albums
     *
     * @return json
     */
    public function list(Request $request)
    {
    	$albums = Categorie::all();
    	return response()->json(['status' => true, 'albums' => $albums]);
    }

    /**
     * Album musics
     *
     * @param  $id unique album id
     * @return json
     */
    public function album(Request $request, $id)
    {
    	$album = Categorie::with(['musics', 'musics.artist'])->find($id);

    	return response()->json(['status' => true, 'album' => $album]);
    }
}
