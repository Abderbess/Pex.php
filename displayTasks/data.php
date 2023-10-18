<?php 

require_once './model/task.php';

function get_tasks(){
    //recupere taches de la base de donnée

    return [
        new Task()
    ];
}