<?php
function routeExecute($route){
    $route = explode("@",$route);
    $controller_filename = CONTROLLERPATH."controller_".$route[0].".php";
    $action_name = "action_".$route[1];
    include $controller_filename;
    return call_user_func($action_name);
}
function navigate(){
    $routes = include ROOTPATH."routing_config.php";
    $url = $_SERVER["REQUEST_URI"];
    $url = trim((explode("?",$url)[0]),"/");
    foreach ($routes as $key=>$value){
        if ($url===$key) return routeExecute($value);
    }
    return routeExecute("error@404");
}