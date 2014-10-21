<?php namespace Walisph\Dashboard;

use Illuminate\Support\ServiceProvider;
use Intervention\Image\ImageManager;
use Walisph\Dashboard\Repositories\DashboardRepository;
use Walisph\Dashboard\Repositories\UploadRepository;

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
		foreach([
			'Upload',
			'Dashboard'] as $module)
		{
			$this->{"register$module"}();
		}
		
	}
	
	protected function registerUpload()
	{
		$this->app->bind('\Walisph\Dashboard\Repositories\UploadRepositoryInterface', function( $app )
		{
			return new UploadRepository( new ImageManager( $app['config']->get('walis-dashboard::image') ));
		});
	}
	
	protected function registerDashboard()
	{
		$this->app->bind('\Walisph\Dashboard\Repositories\DashboardRepositoryInterface', function( $app )
		{
			return new DashboardRepository( $app['files'], $app['config'] );
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
