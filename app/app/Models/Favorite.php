<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favorite extends Model
{

	use SoftDeletes;
	
    protected $hidden = ['token_id', 'updated_at', 'deleted_at'];

    /**
     * Fields that can be mass assigned.
     *
     * @var array
     */
    protected $fillable = ['music_id', 'token_id'];

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
