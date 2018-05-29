<?php

namespace Xagaroo\Pollster;

use Illuminate\Database\Eloquent\Model;
use Xagaroo\Pollster\Poll;
use Xagaroo\Pollster\PollsQuestion;
use Xagaroo\Pollster\PollsUser;

class PollsUser extends Model
{
	protected $fillable = ['poll_id', 'user_id', 'polls_question_id', 'polls_answer_id', 'answer'];


	public static function addLines($request, $id)
	{

		$user = auth()->user();
		$poll = Poll::find($id);

		foreach ($request->get('question') as $question_id => $value) {
			$question = PollsQuestion::find($question_id);

			if ($question->kind == 'selection') {
				$polls_answer_id = $value;
				$answer = null;
			} else {
				$polls_answer_id = null;

				if ($question->kind == 'selection_multiple') {
					$answer = json_encode($value);
				} else {
					$answer = $value;
				}
			}


			PollsUser::create([
				'user_id' => isset($user) ? $user->id : null,
				'poll_id' => $id,
				'polls_question_id' => $question_id,
				'polls_answer_id' => $polls_answer_id,
				'answer' => $answer
			]);
		}
	}
}
