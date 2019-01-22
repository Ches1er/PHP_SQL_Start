<?php
function renderTemplate($template,$content,$data=[]){
    ob_start();
    extract($data);
    include TEMPLATESPATH.$template.".php";
    return ob_get_clean();
}
function renderView($view,$data=[]){
    ob_start();
    extract($data);
    include VIEWPATH.$view.".php";
    return ob_get_clean();
}
function renderViewWithTemplate($view,$template,$data=[]){
    $content = renderView($view,$data);
    return renderTemplate($template,$content,$data);
}