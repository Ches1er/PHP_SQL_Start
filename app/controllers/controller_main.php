<?php
include FNPATH."db_fns.php";
include FNPATH."view_fns.php";

function action_show(){
    empty($_GET['direction'])?$direction='desc':$direction=$_GET['direction'];
    empty($_GET['criteria'])?$criteria='id_note':$criteria=$_GET['criteria'];
    $part=@$_GET["part_name"];
    $data = ["title"=>"Notes",
        "notes"=>db_selectAll("notes_table",$criteria,$direction),
        "part_notes"=>db_selectByPartofTheName("notes_table",$part)
    ];
    return renderViewWithTemplate("main","default",$data);
}

function action_addnote(){
    $name = $_POST['note_name'];
    $desc = $_POST['desc'];
    db_insert("notes_table",["name"=>$name,"desc"=>$desc]);
    header("Location:/");
    return "";
}

function action_delnote(){
    $id = $_GET['id_note'];
    db_delete("notes_table",$id);
    header("Location:/");
    return "";
}

