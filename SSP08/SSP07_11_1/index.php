<?php
//get tasklist array from POST
$task_list = filter_input(INPUT_POST, 'tasklist', 
        FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
if ($task_list === NULL) {
    $task_list = array();
    
//    add some hard-coded starting values to make testing easier
//    $task_list[] = 'Write chapter';
//    $task_list[] = 'Edit chapter';
//    $task_list[] = 'Proofread chapter';
}

//get action variable from POST
$action = filter_input(INPUT_POST, 'action');

//initialize error messages array
$errors = array();

//process
switch( $action ) {
    case 'Add Task':
        $new_task = filter_input(INPUT_POST, 'newtask');
        if (empty($new_task)) {
            $errors[] = 'The new task cannot be empty.';
        } else {
            $task_list[] = $new_task;
        }
        break;
    case 'Delete Task':
        $task_index = filter_input(INPUT_POST, 'taskid', FILTER_VALIDATE_INT);
        if ($task_index === NULL || $task_index === FALSE) {
            $errors[] = 'The task cannot be deleted.';
        } else {
            unset($task_list[$task_index]);
            $task_list = array_values($task_list);
        }
        break;

    case 'Modify Task':
        $task_index = filter_input(INPUT_POST, 'taskid', FILTER_VALIDATE_INT);
        if($task_index === NULL || $task_index === FALSE) {
            $errors[] = 'Task cannot be modified.';
        }
        else {
            $task_to_modify =$task_list[$task_index];
        }
        break;
    
    case 'Save Changes':
        $i = filter_input(INPUT_POST, 'modifiedtaskid', FILTER_VALIDATE_INT);
        $modified_task = filter_input(INPUT_POST, 'modifiedtaskid');
        if (empty($modified_task)) {
            $errors[] ='Modified task cannot be empty.';
        }
        elseif ($i === NULL || $i === FALSE) {
            $errors[] = 'Modified task cannot be completed.';
        }
        else {
            $task_list[$i] = $modified_task;
            $modified_task = '';
        }
        break;
    
    case 'Cancel Changes':
        $modified_task = '';
        break;
    
    case 'Promote Task':
        $task_index = filter_input(INPUT_POST, 'taskid', FILTER_VALIDATE_INT);
        if ($task_index === NULL || $task_index === FALSE) {
            $errors[] = 'Task cannot be promoted';
        }
        elseif ($task_index == 0) {
            $errors[] = 'Cannot promot the first task';
        }
        else {
            //get index values
            $task_value = $task_list[$task_index];
            $prior_task_value = $task_list[$task_index - 1];

            //swap values
            $task_list[$task_index - 1] = $task_value;
            $task_list[$task_index] = $prior_task_value;
        }
        break;

    case 'Sort Tasks':
        sort($task_list);
        break;
    

}

include('task_list.php');
?>