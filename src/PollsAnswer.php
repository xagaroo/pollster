<?php

namespace Xagaroo\Pollster;

use Illuminate\Database\Eloquent\Model;

class PollsAnswer extends Model
{
	protected $fillable = ['poll_question_id', 'order', 'text'];
}
