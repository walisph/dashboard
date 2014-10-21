<?php namespace Walisph\Dashboard\Controllers;

use BaseController;
use Walisph\Dashboard\Repositories\DashboardRepositoryInterface;

class DashboardController extends BaseController {

    /**
     * @var DashboardRepositoryInterface
     */
    protected $dash;

    public function __construct( DashboardRepositoryInterface $dash )
    {
        $this->dash = $dash;
    }
}
 