<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CPMKE;

/**
 * Description of in_kanban_shortcode
 *
 * @author asiries335
 */
class in_kanban_shortcode {
    
    static function init(){
        add_shortcode('in_kanban', array(__CLASS__, 'in_kanban_test'));
    }
    
    //пример использования шорткода [in_kanban category="web" project="73" user="1"]
    //создание шорткода
    static function in_kanban_test($atts){
        
        $atts = shortcode_atts( array(
            'category'   => '',
            'project' => '',
            'user'  => '',     
	), $atts );
        
        $cat = $atts['category'];
        $project_id = $atts['project'];
        $user = $atts['user'];
          
        
        $args = array(
            'p' => $project_id, //номер поста / проекта
            'category'    => $cat, //категория
            'author_name' => $user, //имя пользователя 
            'post_type'   => 'cpm_project',
            'suppress_filters' => true,
        );
        
        //получаем данные проекта
        $posts = query_posts( $args );
        
        //форма комментирования
        $msg1 = cpm_comment_form($project_id);
        
        return  self::template_shortcode($msg1);
    }
    
    //фунция отрисовки шорткода
    static function template_shortcode($msg){
        return $msg;
    }
    
}

in_kanban_shortcode::init();