<?php

/**
 *   @package Plugin_Development
 */

namespace Config\Api\Callbacks;
use Config\Base\BaseController;

class ManagerCallbacks extends BaseController
{
    
   public function  checkboxSanitize($input)
   {
     //return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
     return( isset($input) ? true : false);
   }
 
   public function adminSectionManager(){
    echo 'Activate The Section And Feachure of this ';
   }

   public function checkboxField($arg)
   {
      $name = $arg['label_for'];
      $classes = $arg['classes'];   
      $checkbox = get_option($name);
     return '<input type="checkbox" name=" '.$name.'" value="1" class="'.$classes .'"'.($checkbox ? 'checked':'').'>';
   }

}