<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace CPMKE;


//получаем id проекта из шорткода
$project_id = $data['project_id'];
//таcки по всем проектам пользователей
$user_tasks = $data['task_user'][$project_id];

$task_obj = \CPM_Task::getInstance();

if ( cpm_user_can_access( $project_id, 'tdolist_view_private' ) ) {
    $lists = $task_obj->get_task_lists( $project_id, true );
} else {
    $lists = $task_obj->get_task_lists( $project_id );
}

$sections = kbc_get_sections( $project_id );
$a = kbc_get_section_task_id($sections[74]->ID);
//$tasks_id = get_post_meta( $sections[74]->ID, '_tasks_id', true );

print_r($user_tasks);









$kanban = new User_Kanban();


?>
