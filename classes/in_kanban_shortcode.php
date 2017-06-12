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
    
    static function in_kanban_test($atts){
        
        $atts = shortcode_atts( array(
            'category'   => '0',
            'project' => '0',
            'user'  => '0',     
	), $atts );
        
        $cat = $atts['category'];
        $project_id = $atts['project'];
        $user = $atts['user'];
          
        
        $args = array(
            'p' => $project_id,
            'category'    => $cat,
            'author_name' => $user,
            'post_type'   => 'cpm_project',
            'suppress_filters' => true,
        );
        
        $posts = query_posts( $args );
        
        return print_r($posts);
    }
    
}

in_kanban_shortcode::init();