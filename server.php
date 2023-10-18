<?php


function route_request(){
    $route = $_SERVER['REQUEST_URI'];

    if ($route === "/tutu"){

        require_once('./displayTasks/controller.php');
        display_tasks();

        return;
    }
    
    if ($route === "/contacte"){

        require_once('./displayTasks2/controller1.php');
        display_tasks();

        return;
    }
    if  ($route === "/reservation"){
        require_once('./displayTasks3/controller2.php');
        display_tasks_3();

        return;
    }

    echo "<h1>Bonjour voici les liens /tutu ,/contacte , /reservation </h1>";

}
route_request();