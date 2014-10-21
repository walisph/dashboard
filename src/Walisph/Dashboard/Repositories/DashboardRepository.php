<?php namespace Walisph\Dashboard\Repositories;

use Illuminate\Config\Repository;
use Illuminate\Filesystem\Filesystem;

class DashboardRepository implements DashboardRepositoryInterface {

	/**
	 * @var Filesystem
	 */
	public $file;

	/**
	 * @var Repository
	 */
	public $config;

	public function __construct( Filesystem $filesystem, Repository $config )
	{
		$this->file     = $filesystem;
		$this->config   = $config;
	}

	public function getFilesystem()
	{
		return $this->file;
	}

	public function getConfig()
	{
		return $this->config;
	}

}
 