<?php
include FNPATH."db_fns.php";
function action_show(){
    $data = ["title"=>"Главная",
        "notes"=>db_selectAll(),
    ];
    return renderViewWithTemplate("main","default",$data);
}