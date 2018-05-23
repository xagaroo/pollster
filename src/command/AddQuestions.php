<?php

namespace Xagaroo\Pollster\command;

use Illuminate\Console\Command;
use Xagaroo\Pollster\Poll;
use Xagaroo\Pollster\PollsAnswer;
use Xagaroo\Pollster\PollsQuestion;

class AddQuestions extends Command
{
	protected $signature = 'add:questions';

	protected $description = 'Add questions to existant poll';

	public function handle()
	{
		$this->info("Let's add some questions:");

		$poll_id = $this->ask('Poll id?');
		$poll = Poll::find($poll_id);

		if ($poll) {
			$this->info('Selected poll: ' . $poll->name . ' con ID: ' . $poll->id);
		} else {
			$this->error("Cannot find poll id");
			exit;
		}

		if ($this->confirm('Create a question for this poll?')) {
			$order = PollsQuestion::poll($poll->id)->max('order');

			$order = ($order == null) ? 0 : $order;
			$order++;

			$question = $this->ask('Question number ' . $order);

			$kind = $this->choice('Kind of question', ['text', 'large_text', 'yes_no', 'score_0_5', 'selection', 'selection_multiple']);

			$optionArray = [];
			if ($kind == "selection")
			{
				do {
					$option = $this->ask('Add an option: (Write quit to leave)', 'quit');
					if ($option != "") {
						$optionArray[] = $option;	
					}
				} while ($option != "quit");
			}

			$pq = PollsQuestion::create([
				'poll_id' => $poll->id,
				'question' => $question,
				'order' => $order,
				'kind' => $kind
			]);

			if (count($optionArray) > 0) {
				foreach ($optionArray as $key=>$option) {
					PollsAnswer::create([
						'polls_question_id' => $pq->id,
						'order' => $key,
						'text' => $option
					]);
				}
			}

			$this->info('Question saved!');
		}

	}
}
