<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorie extends Model
{
	use SoftDeletes;
	
    protected $hidden = ['deleted_at', 'updated_at'];

    /**
     * Categorie has many Musics.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function musics()
    {
    	return $this->hasMany(Music::class);
    }
}
