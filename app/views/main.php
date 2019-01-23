<form class="sort" action="/">
    <p><input name="direction" type="radio" value="desc">Desc</p>
    <p><input name="direction" type="radio" value="asc" >Asc</p>
    <p><input name="criteria" type="radio" value="name">Name</p>
    <p><input name="criteria" type="radio" value="id_note">Date</p>
    <p><input type="submit" value="Sort"></p>
</form>
<div class="notes_block">
<?php foreach ($notes as $note): ?>
<dl class="note">
    <dt><?=$note['id_note'].".".$note['name']?></dt>
    <dd><?=$note['desc']?></dd>
    <a href="/delnote?id_note=<?=$note['id_note']?>">del note</a>
</dl>
<?php endforeach;?>
</div>

<form class="addnote" action="/addnote" method="post">
    <p class="form_name">Add note:</p>
    <label for="note_name">Note name:</label>
    <input type="text" name="note_name">
    <label for="desc">Note:</label>
    <textarea name="desc"></textarea>
    <input type="submit" value="Add to the note list">
</form>

<div class="find">
<form class="find_by_part" action="/" method="get">
    <p class="form_name">Find note:</p>
    <label for="note_name">Part of the note:</label>
    <input type="text" name="part_name">
    <input type="submit" value="Find from the note list">
</form>
    <div class="notes_block">
        <?php if ($part_notes!==NULL && !empty($part_notes)):
        foreach ($part_notes as $note): ?>
            <dl class="note">
                <dt><?=$note['id_note'].".".$note['name']?></dt>
                <dd><?=$note['desc']?></dd>
                <a href="/delnote?id_note=<?=$note['id_note']?>">del note</a>
            </dl>
        <?php endforeach;
        else:?>
        <p class="matches">Matches not found</p>
        <?php endif;?>
    </div>
</div>