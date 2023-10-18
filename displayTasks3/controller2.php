<?php 

require_once 'view2.php';

function display_tasks_3(){

    $tasks = [];

    $html = display_tasks_view($tasks);
    echo $html;

}