<?php

/**
 *   @package Plugin_Development
 */
namespace Config\Api\Callbacks;

use Config\Base\BaseController;

class ManagerCallbacks extends BaseController
{
    public function checkboxSanitize($input)
    {
        return (isset($input) ? true : false);
    }

    public function adminSectionManager()
    {
        echo 'Manage the Sections and Features of this Plugin by activating the checkboxes from the following list.';
    }

    public function checkboxField($args)
    {
       $checkbox =get_option( $args );
     
       return;
    }
}
