<?php
/**
 * Jometo ir
 * @package           Jometo.ir Fashion Designer
 * @author            Jafar Naghizadeh
 * @copyright         2024 Jometo.ir
 * @license           GPL-2.0-or-later
 * @wordpress-plugin
 * Plugin Name:       Jometo.ir Fashion Designer
 * Plugin URI:        https://jometo.ir
 * Description:       Developed by Jafar Naghizadeh with 💜 for wordpress ;) 2024.
 * Version:           1.0
 * Requires at least: 4.7
 * Requires PHP:      7.2
 * Author:            Jafar Naghizadeh
 * Author URI:        https://matisweb.com
 * Text Domain:       MatisWeb
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

$modules_jafar = [
    'designer' => [
        'fashion'=> ['maker', 'css','js'],
    ]
];

if (!function_exists('jometo_ir_jafar_shortcode_fnc')) {
    function jometo_ir_jafar_shortcode_fnc( $atts = [], $content = null, $tag = '' ){
        return jometo_ir_jafar_go_to_this_module( $atts );
    }
    add_shortcode('jometo','jometo_ir_jafar_shortcode_fnc');
}

if (!function_exists('jometo_ir_jafar_find_module')) {
    function jometo_ir_jafar_find_module( $title ){
        global $modules_jafar;
        foreach( $modules_jafar as $sec=>$v ){
            @$module = $v[ $title ];
            if( isset( $module ) ){
                $module['index'] = array_search( $title, array_keys($v) ); //used in conversion > functions > rdata
                $module[] = $sec;
                return $module;
            }
        }
        return false;
    }
}

if (!function_exists('jometo_ir_jafar_go_to_this_module')) {
    function jometo_ir_jafar_go_to_this_module( $atts ){
		
        $module = jometo_ir_jafar_find_module( $atts[0] );
        if( !$module ) return "plugin error: 28";
        $type_name = $module[0];
        $section = end($module);
        $version = '1.2'; // for css and js cache

        if( $module[1] )
            wp_enqueue_style(
                "css_for_{$section}_{$type_name}",
                //plugins_url( "/css/{$type_name}.css", __FILE__ ), 
                plugins_url( "/css/main.css?$version", __FILE__ ),  
            );
        if( $module[2] )
            wp_enqueue_script(
                "ajax_script_for_{$section}_{$type_name}",
                plugins_url( "/{$section}/js/{$type_name}.js", __FILE__ ),
                array( 'jquery' ), $version, true
            );

        $inc = dirname(__FILE__) . "/{$section}/{$type_name}.php";
        if( is_file( $inc ) ){
			
            return include_once $inc;

        }else
            return "Plugin file not found: error 27";
    }
}

global $jometo_ir_db_version;
$jometo_ir_db_version = '1.0';

if (!function_exists('jometo_ir_jafar_install')) {
    function jometo_ir_jafar_install() {
        global $jometo_ir_db_version;
        add_option( 'jometo_ir_jafar_db_version', $jometo_ir_db_version );
    }
    register_activation_hook( __FILE__, 'jometo_ir_jafar_install' );
}

if (!function_exists('jometo_ir_jafar_Deactivate')) {
    function jometo_ir_jafar_Deactivate() {
        delete_option( 'jometo_ir_jafar_db_version' );
    }
    register_deactivation_hook( __FILE__, 'jometo_ir_jafar_Deactivate' );
}

