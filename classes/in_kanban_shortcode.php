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
    private $parent_path;
    
    function __construct() {
        $this->parent_path = dirname( __FILE__ );
    }

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
        $user_id = $atts['user'];
        $data_user = [];   
        
        $task = \CPM_Pro_Task::getInstance();
        $task_user = $task->get_mytasks($user_id);
        $msg1 = cpm_comment_form($project_id);
        
        $data_user = [
            "task_user" => $task_user,
            "project_id" => $project_id,
            "cat" => $cat
            ];
        return kanban_ex::get_kanban_template("views/task/index", $data_user);    
    }
       
}

in_kanban_shortcode::init();