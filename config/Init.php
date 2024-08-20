<?php
/**
 * @package Plugin_Development
 */
namespace Config;

 final class Init{
  
    public static function get_Services(){
        return[
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingLinks::class
        ];
    }

     public static function register_services()
    {
        foreach (self:: get_Services() as $class){
            $service = self :: instantiate ($class);
            if (method_exists($service, 'register')){
                $service ->register();
            }
        }
        
    }

    private static function instantiate ($class){
        $service = new $class();
        return $service;
    }

}


/*
use Config\Activate;
use Config\Deactivate;
use Config\Admin\AdminPages;

 
if (!class_exists('DevXpert')) {
    class DevXpert
    {
        public $plugin;
        function __construct()
        {
            $this->plugin = plugin_basename(__FILE__);
            add_action('init', array($this, 'custom_post_type'));
        }

        function register()
        {
             
            //if  its don't show the file in network tab then change the admin_enqueue_scripts to wp_enqueue_scripts
            add_action('wp_enqueue_scripts', array($this, 'enqueue'));
            add_action('admin_menu', array($this, 'add_admin_page'));
            add_filter("plugin_action_links_$this->plugin", array($this, 'setting_link'));
        }
        public function setting_link($links)
        {
            //Add Custom Setting Link
            $setting_link = '<a href="admin.php?page=DevXpert_plugin">Setting </a>';
            array_push($links, $setting_link);
            return $links;
        }

        public function add_admin_page()
        {
            //add_menu_page( 'Page_title', 'Menu_title', 'Capability', 'Menu_slug', array( $this, 'admin_index' ), 'dashicons-store', 110 );
            add_menu_page('DevXpert Plugin', 'DevXpert', 'manage_options', 'DevXpert_plugin', array($this, 'admin_index'), 'dashicons-store', 110);
        }

        public function admin_index()
        {
            // Load admin template
            require_once plugin_dir_path(__FILE__) . 'template/admin.php';
        }
        
        //Inbulid Method to make Custom Post type Like We Create for News, Bookes, Movies
        function custom_post_type()
        {
            register_post_type('Book', ['public' => true, 'label' => 'Book']);
        }

        //This Function is use for link our Css and JavaScript File
        function enqueue()
        {
            wp_enqueue_style('mypluginstyle', plugins_url('/assets/style.css', __FILE__));
            wp_enqueue_script('mypluginScript', plugins_url('/assets/script.js', __FILE__));
        }

        static  function activate()
        {
            // require_once plugin_dir_path(__FILE__) . 'config/devXpert_activation.php';
            Activate::activate();
        }
        static  function deactivate()
        {
            // require_once plugin_dir_path(__FILE__) . 'config/devXpert_activation.php';
            Deactivate::deactivate();
        }
    }

    $devXpert = new DevXpert();
    $devXpert->register();
    $devXpert->activate();


    //Activation

    register_activation_hook(__FILE__, array('DevXpert', 'activate'));

    //Dectivation
    //require_once plugin_dir_path(__FILE__) . 'config/devXpert_deactivation.php';
    register_deactivation_hook(__FILE__, array('DevXpert','deactivate'));

    //Uninstall 
}
*/