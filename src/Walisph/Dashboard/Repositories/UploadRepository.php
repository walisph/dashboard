<?php namespace Walisph\Dashboard\Repositories;

use Intervention\Image\ImageManager;

class UploadRepository implements UploadRepositoryInterface {

	/**
	 * @var ImageManager
	 */
	public $image;

	public function __construct( ImageManager $image )
	{
		$this->image = $image;
	}

	/**
	 * @return ImageManager
	 */
	public function getImage()
	{
		return $this->image;
	}
}
 