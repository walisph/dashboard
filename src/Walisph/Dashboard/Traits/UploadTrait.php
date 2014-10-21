<?php namespace Walisph\Dashboard\Traits;

trait UploadTrait {

	/**
	 * Filename creation
	 *
	 * @param $suffix
	 * @param $file
	 *
	 * @return string
	 */
	public function createFileName( $suffix, $file )
	{
		return date( "Y-n-d-His" ) . '_' . sha1( $file->getClientOriginalName() . time() ) . '_' . $suffix . '.' . $file->getClientOriginalExtension();
	}
}
 