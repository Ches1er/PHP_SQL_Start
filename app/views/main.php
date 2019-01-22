<div class="notes_block">
<?php foreach ($notes as $note): ?>
<dl class="note">
    <dt><?=$note['id_note'].".".$note['id_name']?></dt>
    <dd><?=$note['desc']?></dd>
    <a href="/delnote?id_note=<?=$note['id_note']?>">del note</a>
</dl>
<?php endforeach;?>
</div>

<form action="/addnote" method="post">
    <p class="form_name">Add note:</p>
    <label for="note_name">Note name:</label>
    <input type="text" name="note_name">
    <label for="desc">Note:</label>
    <textarea name="desc"></textarea>
    <input type="submit" value="Add to the note list">
</form>