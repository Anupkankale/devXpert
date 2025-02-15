<?php
/**   
 *Plugin Name: DevXpert
 *Plugin URL : http://DevXpert.com
 *Description: Welcome to DevXpert, the ultimate development toolkit designed to empower both novice and experienced WordPress developers.
 *Whether you’re just starting out or you’re a seasoned pro, DevXpert offers a comprehensive suite of tools and features that rival premium plugins.
 *Version: 1.0
 *Author: Anup_Kankale
 *Author URl: http://anupkankale.com
 * @package Plugin_Development
 */

//if this file is called directly, Mission Abort !!!
defined('ABSPATH') or die('Hey what are you doing here ?');

//Require once the Composer Autoload
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}
//This Code is runs During plugin activation
function activate_devXpert_plugin()
    {
     Config\Base\Activate::activate();
    }

     register_activation_hook(__FILE__, 'activate_devXpert_plugin');

    function deactivate_devXpert_plugin()
        {
           Config\Base\Deactivate::deactivate();
        }

        register_deactivation_hook(__FILE__, 'deactivate_devXpert_plugin');
 
//Intialize all the core classes of the plugin
if ( class_exists('Config\\Init')){
    Config\Init::register_services();
}
