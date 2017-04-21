
<?php 
/**
 * Plugin Name: in_kanban_ext
 * Plugin URI: test
 * Description: Plug-in extensions kanban
 * Version: 0.1
 * Author: Ivan Nikitin and partners
 * Author URI: http://ivannikitin.com
 *
 * Copyright 2016 Ivan Nikitin  (email: info@ivannikitin.com)
 *
 */

// Напрямую не вызываем!
if ( ! defined( 'ABSPATH' ) ) 
	die( '-1' );


// Определения плагина
define( 'CPMKE', 		'in_kanban_ex' );						// Название плагина и текстовый домен
define( 'CPMKE_PATH', 	plugin_dir_path( __FILE__ ) );		// Путь к папке плагина
define( 'CPMKE_URL', 	plugin_dir_url( __FILE__ ) );		// URL к папке плагина

// Инициализация плагина
add_action( 'init', 'cpmke_init' );
function cpmke_init() 
{
	// Локализация плагина
	load_plugin_textdomain( CPMKE, false, dirname( plugin_basename( __FILE__ ) ) . '/lang' );		
		
	// Классы плагина
	require( CPMKE_PATH . 'classes/settings.php' );
	require( CPMKE_PATH . 'classes/kanban_ex.php' );
	//require( CPMKE_PATH . 'classes/event.php' );
	//require( CPMKE_PATH . 'classes/event-new-project.php' );
	//require( CPMKE_PATH . 'classes/event-new-task.php' );
	//require( CPMKE_PATH . 'classes/event-new-comment.php' );
	//require( CPMKE_PATH . 'classes/event-complete-task.php' );
	require( CPMKE_PATH . 'classes/plugin.php' );

		
	// Инициализация плагина
	new CPMKE\Plugin( CPMKE_PATH, CPMKE_URL );	
}