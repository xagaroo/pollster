<?php

namespace Xagaroo\Pollster\command;

use Illuminate\Console\Command;
use Xagaroo\Pollster\Poll;

class CreatePoll extends Command
{
	protected $signature = 'poll:generate';

	protected $description = 'Generate a new poll';

	public function handle()
	{
		$this->info("Let's create a poll:");

		$name = $this->ask('Poll name?');

		$poll = Poll::create(['name' => $name]);

		if ($poll) {
			$this->line("Poll created with id {$poll->id}");
		} else {
			$this->error("Cannot create poll");
		}
		
	}
}
