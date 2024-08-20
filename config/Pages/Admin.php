<?php

/**
 *   @package Plugin_Development
  
 */

namespace Config\Pages;

use \Config\Base\BaseController;
use \Config\Api\SettingsApi;

class Admin extends BaseController
{

    public $settings;
    public $pages = array();
    public $subpages = array();

    public function __construct()
    {

        $this->settings = new SettingsApi();


        $this->pages = array(
            array(
                'page_title' =>  'DevXpert Plugin',
                'menu_title' =>  'DevXpert',
                'capability' =>  'manage_options',
                'menu_slug' => 'devXpert_plugin',
                 'callback' => function () { return require_once( plugin_dir_path(dirname(__FILE__,2))."/template/admin.php");},
                //'callback'  => function (){return require_once("$this->plugin_path/template/admin.php");},
                'icon_url' => 'dashicons-store',
                'position' => 110

            )
        );

        $this->subpages = array(
            array(
                'parent_slug' => 'devXpert_plugin',
                'page_title' => 'Custom Post Types',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'devXpert_cpt',
                'callback' =>  function () {
                    echo '<h1> CPT  Manager</h1>';
                },
            ),

           /* array(
                'parent_slug' => 'devXpert_plugin',
                'page_title' => 'Custom Social Media Feed',
                'menu_title' => 'CSMF',
                'capability' => 'manage_options',
                'menu_slug' => 'devXpert_CSMF',
                'callback' =>  function () {
                    echo '<h1> CSMF Manager</h1>';
                },
            ),*/
            array(
                'parent_slug' => 'devXpert_plugin',
                'page_title' => 'Custom Widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'devXpert_widgets',
                'callback' =>  function () {
                    echo '<h1>  Widgets Manager</h1>';
                },
            ),
            array(
                'parent_slug' => 'devXpert_plugin',
                'page_title' => 'Custom Texanomies',
                'menu_title' => 'Texanomies',
                'capability' => 'manage_options',
                'menu_slug' => 'devXpert_texanomies',
                'callback' =>  function () {
                    echo '<h1> Texanomies Manager</h1>';
                },
            )
        );
    }
    public function register()
    {
        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    }
}
