<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Token extends Model
{
	use SoftDeletes;

	/**
	 * Fields that can be mass assigned.
	 *
	 * @var array
	 */
	protected $fillable = ['token'];

	/**
	 * Token has many Favorites.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function favorites()
	{
		return $this->hasMany(Favorite::class);
	}
}
