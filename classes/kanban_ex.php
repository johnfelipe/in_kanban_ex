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
    public function __construct() {
        //echo "<script>Alert(2334);</script>";
       $this->add_menu_kanban_user();
    }
    
    public function add_menu_kanban_user() {  
      // $task = new CPM_Pro_Task();
       $task = \CPM_Pro_Task::getInstance();
       $task->my_task_current_tab("asd");
       
       //$project = $task->get_mytasks( $user_id );
      // $count   = $task->mytask_count( $user_id );
  

       
        
    }
}
