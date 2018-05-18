<?php

namespace Xagaroo\Pollster;

use Illuminate\Database\Eloquent\Model;

class PollsUser extends Model
{
	protected $fillable = ['poll_id', 'user_id', 'polls_question_id', 'polls_answer_id', 'answer'];

}
