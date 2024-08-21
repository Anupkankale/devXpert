<?php
  /**
  * @package Plugin_Development
 */
namespace Config\Base;

use \Config\Base\BaseController;
  class SettingLinks extends BaseController
  {
 

   public  function register(){
        add_filter("plugin_action_links_$this->plugin", array($this, 'setting_link'));
      
         
    }

    public function setting_link($links)
    {
        //Add Custom Setting Link
        $setting_link = '<a href="admin.php?page=DevXpert_plugin">Setting </a>';
        array_push($links, $setting_link);
        return $links;
    }

   }


   
