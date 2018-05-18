<?php

namespace Xagaroo\Pollster;

use Illuminate\Database\Eloquent\Model;
use Xagaroo\Pollster\PollsAnswer;

class PollsQuestion extends Model
{
	protected $fillable = ['poll_id', 'question', 'order', 'kind'];

	public function answers()
	{
		return $this->hasMany(PollsAnswer::class);
	}
	
	public function scopePoll($query, $poll_id)
	{
		return $query->where('poll_id', $poll_id);
	}
}
