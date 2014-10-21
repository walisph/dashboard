<?php namespace Walisph\Dashboard\Controllers;

use Walisph\Dashboard\Traits\UploadTrait;

class UploadController extends DashboardController {

	use UploadTrait;

	/**
	 * @param $folder
	 *
	 * @return bool
	 */
	protected function createDirectory( $folder )
	{
		if( ! $this->dash->file->exists( public_path( $this->getConfiguration('upload', 'local') . $folder )) )
		{
			return $this->dash->file->makeDirectory( public_path( $this->getConfiguration('upload', 'local') . $folder ), 0777, true );
		}
		return true;
	}

	/**
	 * @param $file
	 * @param $directory
	 *
	 * @return array
	 */
	protected function compilingImage( $file, $directory )
	{
		$image = [];
		$quality = [
			'jpg' => $this->getConfiguration('upload', 'quality.jpg'),
			'image' => $this->getConfiguration('upload', 'quality.image')
		];
		$local_save_dir = public_path( $this->getConfiguration('upload', 'local') . $directory );
		$images = [
			// SMALL size
			$this->getImage()->make( $file )
				->fit(
				 $this->getConfiguration('upload', 'sizes.square.size' )
				)
				->encode(
					'image/jpg',
					$quality['jpg']
				)
				->save(
					$local_save_dir . $this->createFileName( $this->getConfiguration('upload', 'sizes.square.name'), $file ),
					$quality['image']
				),

			// THUMBNAIL size
			$this->getImage()->make( $file )
				->fit(
					$this->getConfiguration('upload', 'sizes.thumbnail.size')
				)
				->encode(
					'image/jpg',
					$quality['jpg']
				)
				->save(
					$local_save_dir . $this->createFileName( $this->getConfiguration('upload', 'sizes.thumbnail.name'), $file ),
					$quality['image']
				),

			// SMALL size
			$this->getImage()->make( $file )
				->resize(
					$this->getConfiguration('upload', 'sizes.small.width'),
					null,
					function( $constraint )
					{
						$constraint->aspectRatio();
					}
				)
				->encode(
					'image/jpg',
					$quality['jpg']
				)
				->save(
					$local_save_dir . $this->createFileName( $this->getConfiguration('upload', 'sizes.small.name'), $file ),
					$quality['image']
				),

			// LARGE size
			$this->getImage()->make( $file )
				->resize(
					$this->getConfiguration('upload', 'sizes.large.width'),
					null,
					function( $constraint )
					{
						$constraint->aspectRatio();
					}
				)
				->encode(
					'image/jpg',
					$quality['jpg']
				)
				->save(
					$local_save_dir . $this->createFileName( $this->getConfiguration('upload', 'sizes.large.name'), $file ),
					$quality['image']
				),

		// ORIGINAL size
		$this->getImage()->make( $file )
			->encode(
				'image/jpg',
				$quality['jpg']
			)
			->save(
				$local_save_dir . $this->createFileName( $this->getConfiguration('upload', 'sizes.original.name'), $file ),
				$quality['image']
			)

		];

		foreach( $images as $key => $value )
		{
			$image[] = [
				'width' => $images[ $key ]->getWidth(),
				'height' => $images[ $key ]->getHeight(),
				'url' => $this->getConfiguration('upload', 'local') . "$directory$value->basename",
				'base_dir' => "$directory$value->basename"
			];
		}
		return $image;
	}
}
 