<?php

/**
 *   @package Plugin_Development
 
 */

namespace Config\Pages;

use Config\Api\Callbacks\AdminCallbacks as CallbacksAdminCallbacks;
use \Config\Api\SettingsApi;
use \Config\Base\BaseController;
use \Config\Api\Callbacks\AdminCallbacks;

use function PHPSTORM_META\argumentsSet;

class Admin extends BaseController
{

    public $settings;
    public $callbacks;
    public $pages = array();
    public $subpages = array();

    public function register()
    {
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setPages();

        $this->setSubpages();

        $this->setSettings();

        $this->setSection();

        $this->setField();

        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    }
    //its used to set pagesgit
    public function setPages()
    {

        $this->pages = array(
            array(
                'page_title' =>  'DevXpert Plugin',
                'menu_title' =>  'DevXpert',
                'capability' =>  'manage_options',
                'menu_slug' => 'devXpert_plugin',
                //'callback' => function () {
                //  return require_once(plugin_dir_path(dirname(__FILE__, 2)) . "/template/admin.php");},
                'callback'  => array($this->callbacks, 'adminDashboard'),
                'icon_url' => 'dashicons-store',
                'position' => 110

            )
        );
    }

    public function setSubpages()
    {

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

    public function setSettings()
    {
        $args = array(
            array(
                'option_group' => 'devXpert_option_group',
                'option_name' => 'text_example',
                'callback' => array($this->callbacks, 'devXpertOptionGroup')
            )
        );

        $this->settings->setSettings($args);
    }

    public function setSection()
    {
        $args = array(
            array(
                'id' => 'devXpert_admin_index',
                'title' => 'Settings',
                'callback' => array($this->callbacks, 'devXpertAdminSection'),
                'page' => 'devXpert_plugin'
            )
        );

        $this->settings->setSection($args);
    }

    public function setField()
    {
        $args = array(
            array(
                'id' => 'test_example',
                'title' => 'Text Example',
                'callback' => array($this->callbacks, 'devXpertTextExample'),
                'page' => 'devXpert_plugin',
                'section' => 'devXpert_admin_index',
                'args' => array(
                    'label_for' => 'text_example',
                    'class' => 'example-class'
                )

            )
        );

        $this->settings->setField($args);
    }
}
