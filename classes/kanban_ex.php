<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CPMKE;

/**
 * Description of kanban_ex
 *
 * @author asiries335
 */
class kanban_ex {
    
    private $parent_path;
    public function __construct() {
        $this->parent_path = dirname(__FILE__);
      // $this->add_menu_kanban_user();
    }
    
    public function get_kanban_template($template, $data = array()){
        extract($data);
        
        require_once CMPKE_PATH_DIR."/". $template.'.php';    
    }
    
    public function add_menu_kanban_user() {  
      $this->register_post_type(); 
    }
    
   public function register_post_type() {
        register_post_type( 'cpm_kanban_ext', array(
            'label'               => __( 'kanban ext', 'cpm' ),
            'description'         => __( 'kanban ext', 'cpm' ),
            'public'              => false,
            'show_in_admin_bar'   => false,
            'exclude_from_search' => true,
            'publicly_queryable'  => false,
            'show_in_admin_bar'   => false,
            'show_ui'             => false,
            'show_in_menu'        => false,
            'capability_type'     => 'post',
            'hierarchical'        => false,
            'rewrite'             => array( 'slug' => 'task-list' ),
            'query_var'           => true,
            'supports'            => array( 'title', 'editor', 'delete' ),
            'show_in_json'        => true,
            'labels'              => array(
                'name'               => __( 'Task List 1', 'cpm' ),
                'singular_name'      => __( 'Task List 2', 'cpm' ),
                'menu_name'          => __( 'Task List 3', 'cpm' ),
                'add_new'            => __( 'Add Task List 1', 'cpm' ),
                'add_new_item'       => __( 'Add New Task List 1', 'cpm' ),
                'edit'               => __( 'Edit 1', 'cpm' ),
                'edit_item'          => __( 'Edit Task List 1', 'cpm' ),
                'new_item'           => __( 'New Task List 22', 'cpm' ),
                'view'               => __( 'View Task List 1', 'cpm' ),
                'view_item'          => __( 'View Task List 4', 'cpm' ),
                'search_items'       => __( 'Search Task List 5', 'cpm' ),
                'not_found'          => __( 'No Task List Found 6', 'cpm' ),
                'not_found_in_trash' => __( 'No Task List Found in Trash 7', 'cpm' ),
                'parent'             => __( 'Parent Task List', 'cpm 8' ),
            ),
        ) );

    }
    
    
}
