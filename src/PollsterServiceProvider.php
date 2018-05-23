<?php

namespace Xagaroo\Pollster;

use Illuminate\Support\ServiceProvider;
use Xagaroo\Pollster\command\AddQuestions;
use Xagaroo\Pollster\command\CreatePoll;

class PollsterServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->loadRoutesFrom(__DIR__.'/routes/web.php');
		$this->loadMigrationsFrom(__DIR__.'/migrations');
		$this->loadViewsFrom(__DIR__.'/views', 'pollster');

		$this->publishes([
			__DIR__.'/views' => resource_path('views/vendor/pollster'),
		], 'views');
		$this->publishes([
			__DIR__ . '/migrations' => $this->app->databasePath() . '/migrations'
		], 'migrations');
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('command.create:poll', CreatePoll::class);
		$this->app->bind('command.add:questions', AddQuestions::class);
		$this->commands([
			'command.create:poll',
			'command.add:questions'
		]);
	}
}
