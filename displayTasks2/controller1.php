<?php 

require_once 'view1.php';

function display_tasks(){
    $tasks = [];

    $html = display_tasks_view($tasks);
    echo $html;

}