
<?php
define("DOCROOT",$_SERVER["DOCUMENT_ROOT"]);
define("ROOTPATH",DOCROOT."/app/root/");
define("CONTROLLERPATH",DOCROOT."/app/controllers/");
define("VIEWPATH",DOCROOT."/app/views/");
define("TEMPLATESPATH",DOCROOT."/app/templates/");
define("FNPATH",DOCROOT."/app/functions/");
define("USERSDIR","/users_files");
include ROOTPATH."routing.php";
echo navigate();

//db_insert("films",["name"=>"trulala","year"=>2007,"user_id"=>1]);
$show_all_notes = db_selectAll("note_table");
foreach ($show_all_notes as $note): ?>
<div class="note">
    <div class="note_name"><?=$note['name']?></div>
    <div class="note_name"><?=$note['desc']?></div>
</div>
<?php endforeach;?>

<form action="/addnote" method="post">
    <p>Добавление заметки:</p>
    <label for="note_name">Имя заметки:</label>
    <input type="text" name="note_name">
    <label for="desc">Заметка:</label>
    <input type="text" name="desc">
    <input type="submit" value="Создать заметку">
</form>


