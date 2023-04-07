<?php


/*
Plugin Name:  COntact form plugin
Plugin URI:   https://www.wpbeginner.com
Description:  A short little description of the plugin. It will be displayed on the Plugins page in WordPress admin area.
Version:      1.0
Author:       WPBeginner
Author URI:   https://www.wpbeginner.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wpb-tutorial
Domain Path:  contact-plugin
*/


if (!defined('ABSPATH'))
{
    die();
}

if (!class_exists('ContactPlugin'))
{
class ContactPlugin
{
     public function __construct()
     {
         define('MY_PLUGIN_PATH', plugin_dir_path(__FILE__));
         require_once (MY_PLUGIN_PATH . 'vendor/autoload.php');
     }

     public function initialize()
     {
        include_once MY_PLUGIN_PATH . 'includes/utilities.php';

	     include_once MY_PLUGIN_PATH . 'includes/options-page.php';

     }
}


    $contactPlugin  = new ContactPlugin;
    $contactPlugin->initialize();
}