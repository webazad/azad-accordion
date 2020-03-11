<?php
/* 
Plugin Name: Azad Accordion
Description: Description will go here...
Plugin URI: gittechs.com/plugin/azad-accordion
Author: Md. Abul Kalam Azad
Author URI: gittechs.com/author
Author Email: webdevazad@gmail.com
Version: 1.0.0
License: GPL2
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: azad-accordion
Domain Path: /languages

@package: azad-accordion
*/ 

// EXIT IF ACCESSED DIRECTLY
defined('ABSPATH') || exit;

use Inc\Admin\Activate;
use Inc\Admin\Deactivate;

if(file_exists(dirname(__FILE__) . '/vendor/autoload.php')){
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

if ( class_exists( 'Inc\\Init' ) ) :    
    Inc\Init::register_services();
endif;

require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
$plugin_data = get_plugin_data( __FILE__ );

define( 'AZAD_WP_STARTER_PLUGIN_NAME', $plugin_data['Name'] );
define( 'AZAD_WP_STARTER_PLUGIN_VERSION', $plugin_data['Version'] );
define( 'AZAD_WP_STARTER_PLUGIN_TEXTDOMAIN', $plugin_data['TextDomain'] );
define( 'AZAD_WP_STARTER_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'AZAD_WP_STARTER_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'AZAD_WP_STARTER_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

if(! class_exists('Azad_WP_Starter_Plugin')){
    final class Azad_WP_Starter_Plugin{
		public static $instance = null;
        public function __construct(){
		    add_action('plugins_loaded',array($this,'admin'),4);
        }
		public function azad_admin_acripts(){
            //wp_enqueue_script('azad-nice-scroll');
        }
        public static function _get_instance(){
            if(is_null(self::$instance) && ! isset(self::$instance) && ! (self::$instance instanceof self)){
                self::$instance = new self();            
            }
            return self::$instance;
        }
        public function __destruct(){}
    }
}
if(! function_exists('load_azad_wp_starter_plugin')){
    function load_azad_wp_starter_plugin(){
        return Azad_WP_Starter_Plugin::_get_instance();
    }
}
$GLOBALS['load_azad_wp_starter_plugin'] = load_azad_wp_starter_plugin();