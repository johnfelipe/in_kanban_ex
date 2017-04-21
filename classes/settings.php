<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CPMKE;

/**
 * Description of settings
 *
 * @author asiries335
 */
class Settings {
    
    protected $_plugin = null;
    protected $_name = null;
    protected $_params = null;
    
    	public function __construct( $optionName = '', $plugin )
	{
		if ( empty ( $optionName ) ) $optionName = get_class( $this );
		$this->_name = $optionName;
		
		$this->plugin = $plugin;
		
		// Загружаем параметры
		$this->load();
		
		// Если это работа в админке
		if ( is_admin() )
		{
			// Стили для админки
			 //wp_enqueue_style(\CPMKE, $this->plugin->url . 'assets/css/admin.css' );
			
			// Страница настроек
			add_action( 'admin_menu', array( $this, 'addSettingsPage' ) );
		}
		
		// Другие обработчики
		add_action( 'cpm_project_settings', array( $this, 'showProjectSettings' ) );
	}
        
        
    	/**
	 * Загрузка параметров в массив из БД Wordpress
	 */
	public function load()
	{
		$this->_params = get_option( $this->_name, array() );
	}
	
	/**
	 * Сохранение параметров в БД Wordpress
	 */
	public function save()
	{
		update_option( $this->_name, $this->_params );
	}

	/**
	 * Чтение параметра
	 * @param string	$param		Название параметра
	 * @param mixed 	$default	Значение параметра по умолчанию, если его нет или он пустой
	 * @return mixed				Возвращает параметр
	 */
	public function get( $param, $default = false )
	{
		if ( ! isset( $this->_params[ $param ] ) )
			return $default;
		
		if ( empty( $this->_params[ $param ] ) )
			return $default;
		
		return $this->_params[ $param ];
	}
	
	/**
	 * Сохранение параметра
	 * @param string	$param		Название параметра
	 * @param mixed 	$value		Значение параметра
	 */
	public function set( $param, $value )
	{
		$this->_params[ $param ] = $value;
	}
	
	/**
	 * Чтение свойства
	 * @param string	$param		Название параметра
	 */
	public function __get( $param )
	{
		return $this->get( $param );
	}
	/**
	 * Запись свойства
	 * @param string	$param		Название параметра
	 */
	public function __set( $param, $value )
	{
		return $this->set( $param, $value );
	}	
        
        
         public function addSettingsPage()
	{
		add_submenu_page(
			'cpm_projects',
			__( 'Kanban ex', CPMKE ),
			__( 'Kanban ex', CPMKE ),
			'manage_options',
                        CPMKE,
			array( $this, 'kanban_show_setting' )
		);		
	}
        
        public function kanban_show_setting(){
            echo 'dfgdfgdfg';
        }
}
