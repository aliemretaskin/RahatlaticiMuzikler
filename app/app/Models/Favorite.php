<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $hidden = ['token_id', 'updated_at', 'deleted_at'];

    /**
     * Favorite belongs to Music.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function music()
    {
    	return $this->belongsTo(Music::class);
    }
}
