<?php

/**
 *   @package Plugin_Development
 */

namespace Config\Api\Callbacks;
use Config\Base\BaseController;

class AdminCallbacks extends BaseController
{
    public function adminDashboard()
    {
        return require_once("$this->plugin_path/template/admin.php");

    }





}