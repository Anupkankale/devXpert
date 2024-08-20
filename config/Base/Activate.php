<?php
  /**
  * @package Plugin_Development
 */
namespace Config\Base;
  class Activate
  {
    public static function activate(){
      
        flush_rewrite_rules();
    }
   }


   
