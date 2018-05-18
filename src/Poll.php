<?php

namespace Xagaroo\Pollster;

use Illuminate\Database\Eloquent\Model;
use Xagaroo\Pollster\PollsQuestion;

class Poll extends Model
{
	protected $fillable = ['name'];

	public function questions()
	{
		return $this->hasMany(PollsQuestion::class);
	}
}
