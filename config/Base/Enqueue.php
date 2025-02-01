<?php /**
 *   @package Plugin_Development
  
 */
namespace Config\Base;
use \Config\Base\BaseController;

 class Enqueue extends BaseController
 {
     public function register(){
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    //This Function is use for link our CSS and JavaScript File
    function enqueue()
    {
        wp_enqueue_style('mypluginstyle',   $this->plugin_url .'/assets/style.css');
        wp_enqueue_script('mypluginScript', $this->plugin_url .'/assets/script.js');
    }

    }
