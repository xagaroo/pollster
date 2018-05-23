<?php
Route::group(['middleware' => ['web']], function () {

	Route::get('poll/ok', function() {
		return view('pollster::ok');
	});

	Route::get('poll/{id}', function($id) {
		$poll = Xagaroo\Pollster\Poll::find($id);

		return view('pollster::form', compact('poll'));
	});

	Route::post('poll/{id}', function(Illuminate\Http\Request $request, $id) {

		$user = auth()->user();

		foreach ($request->get('question') as $question_id => $value) {
			$question = Xagaroo\Pollster\PollsQuestion::find($question_id);

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


			Xagaroo\Pollster\PollsUser::create([
				'user_id' => isset($user) ? $user->id : null,
				'poll_id' => $id,
				'polls_question_id' => $question_id,
				'polls_answer_id' => $polls_answer_id,
				'answer' => $answer
			]);

		}

		return redirect('/poll/ok');

	});

});