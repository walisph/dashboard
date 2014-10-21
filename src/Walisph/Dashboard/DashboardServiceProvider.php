<?php namespace Walisph\Dashboard;

use Illuminate\Support\ServiceProvider;
use Walisph\Dashboard\Repositories\DashboardRepository;

class DashboardServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('walisph/dashboard', 'walis-dashboard');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('\Walisph\Dashboard\Repositories\DashboardRepositoryInterface', function( $app ){
			return new DashboardRepository( $app['file'], $app['config'] );
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
