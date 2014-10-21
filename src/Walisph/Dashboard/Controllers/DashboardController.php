<?php namespace Walisph\Dashboard\Controllers;

use BaseController;
use Walisph\Dashboard\Repositories\DashboardRepositoryInterface;
use Walisph\Dashboard\Repositories\UploadRepositoryInterface;

class DashboardController extends BaseController {

	/**
	 * @var DashboardRepositoryInterface
	 */
	protected $dash;

	/**
	 * @var UploadRepositoryInterface
	 */
	protected $upload;

	/**
	 * @param DashboardRepositoryInterface $dash
	 * @param UploadRepositoryInterface $upload
	 */
	public function __construct( DashboardRepositoryInterface $dash, UploadRepositoryInterface $upload )
	{
		$this->dash     = $dash;
		$this->upload   = $upload;
	}

	public function getConfiguration( $config = 'config', $name = null )
	{
		if ( ! $name )
		{
			return $this->dash->getConfig()->get( 'walis.dashboard::' . $config );
		}

		return $this->dash->getConfig()->get( 'walis-dashboard::' . $config . '.' . $name );
	}

	/**
	 * @return DashboardRepositoryInterface
	 */
	public function getDash()
	{
		return $this->dash;
	}

	/**
	 * @return DashboardRepositoryInterface
	 */
	public function getDashboardRepository()
	{
		return $this->dash;
	}

	/**
	 * @return UploadRepositoryInterface
	 */
	public function getUpload()
	{
		return $this->upload;
	}

	/**
	 * @return UploadRepositoryInterface
	 */
	public function getUploadRepository()
	{
		return $this->upload;
	}

	/**
	 * Get instance of Image of Intervention
	 *
	 * @return mixed
	 */
	protected function getImage()
	{
		return $this->upload->getImage();
	}
}
 