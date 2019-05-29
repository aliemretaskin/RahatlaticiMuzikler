<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Music extends Model
{
	use SoftDeletes;

    protected $hidden = ['categorie_id', 'artist_id','updated_at', 'deleted_at'];

    /**
     * Music belongs to Categorie.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categorie()
    {
    	return $this->belongsTo(Categorie::class);
    }

    /**
     * Music belongs to Artist.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function artist()
    {
    	return $this->belongsTo(Artist::class);
    }
}