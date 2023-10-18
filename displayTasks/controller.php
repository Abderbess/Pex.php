<?php 

require_once 'view.php';


function display_tasks(){
    $tasks = [];

    $html = display_tasks_view($tasks);
    echo $html;


}

