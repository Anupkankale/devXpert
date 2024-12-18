<?php

/**
 *   @package Plugin_Development
 
 */

namespace Config\Pages;

 
use \Config\Api\SettingsApi;
use \Config\Base\BaseController;
use \Config\Api\Callbacks\AdminCallbacks;
use \Config\Api\Callbacks\ManagerCallbacks;

 class Admin extends BaseController
{

    public $settings;
    public $callbacks;
    public $callbacks_mngr;
    public $pages = array();
    public $subpages = array();

     public function register()
    {
        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();
        $this->callbacks_mngr = new ManagerCallbacks();

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
                'option_group' => 'devXpert_option_Settings',
                'option_name' => 'cpt_Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
            ),
            array(
                'option_group' => 'devXpert_option_Settings',
                'option_name' => 'taxonomy_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
            ),
            array(
                'option_group' => 'devXpert_option_Settings',
                'option_name' => 'media_widget',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
            ),
            array(
                'option_group' => 'devXpert_option_Settings',
                'option_name' => 'testimonials_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
            ),
            array(
                'option_group' => 'devXpert_option_Settings',
                'option_name' => 'gallery_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
            ),
            array(
                'option_group' => 'devXpert_option_Settings',
                'option_name' => 'templates_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
            ),
            array(
                'option_group' => 'devXpert_option_Settings',
                'option_name' => 'login_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
            ),
            array(
                'option_group' => 'devXpert_option_Settings',
                'option_name' => 'membership_manager',
                'callback' => array($this->callbacks_mngr, 'checkboxSanitize')
            ),
            array(
                'option_group' => 'devXpert_option_Settings',
                'option_name' => 'chat_manager',
                'callback' => array($this->callbacks, 'checkboxSanitize')
            ),


        );

        $this->settings->setSettings($args);
    }

    public function setSection()
    {
        $args = array(
            array(
                'id' => 'devXpert_admin_index',
                'title' => 'Settings Manager',
                'callback' => array($this->callbacks_mngr, 'adminSectionManager'),
                'page' => 'devXpert_plugin'
            )
        );

        $this->settings->setSection($args);
    }

    public function setField()
    {
        $args = array(
            array(
                'id' => 'cpt_Manager',
                'title' => 'Activate Custom Post Type Manager',
                'callback' => array($this->callbacks_mngr, 'checkboxField'),
                'page' => 'devXpert_plugin',
                'section' => 'devXpert_admin_index',
                'args' => array(
                    'label_for' => 'cpt_Manager',
                    'class' => 'ui-toggle'

                )

            )
        );

        $this->settings->setField($args);
    }
}
