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

   public function devXpertOptionGroup($input)
   {
     return $input;
   }
    
   public function devXpertAdminSection()
   {
    
    echo 'Check this beautiful Section....!';
   }
    
   public function devXpertTextExample()
   {
    $value = esc_attr( get_option('text_example'));
     

    echo '<input type="text" class="regular-text" name="text_example" value="' .$value. '"placeholder="Write Something Here!"> ';
   }

}