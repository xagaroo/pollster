<?php

Route::get('poll/{id}', function($id) {
	$poll = Xagaroo\Pollster\Poll::find($id);

	return view('pollster::form', compact('poll'));
});

Route::post('poll/{id}', function(Illuminate\Http\Request $request, $id) {

	$user = auth()->user();

	foreach ($request->get('question') as $question_id => $value) {
		$question = Xagaroo\Pollster\PollsQuestion::find($question_id);

		Xagaroo\Pollster\PollsUser::create([
			'user_id' => isset($user) ? $user->id : null,
			'poll_id' => $id,
			'polls_question_id' => $question_id,
			'polls_answer_id' => ($question->kind == "selection") ? $value : null,
			'answer' => ($question->kind == "selection") ? null : $value
		]);

	}

});