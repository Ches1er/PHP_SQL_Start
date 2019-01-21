<?php
function db_getConnection(){
    static $dbh =null;
    if($dbh!=null) return $dbh;
    $dbh = new PDO(
        "mysql:dbname=notes;host=127.0.0.1;port=3306;charset=utf8",
        "root",
        "",
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
    return $dbh;
}

function db_insert(string $table,array $arr){
    $q = "INSERT INTO `{$table}`";
    $fields = array_keys($arr);
    $q.="(`".implode("`,`",$fields)."`)VALUES (:"
        .implode(",:",$fields).")";
    $stmt = db_getConnection()->prepare($q);
    $stmt->execute($arr);
}

function db_insertAll(string $table,array $arr){
    $q = "INSERT INTO `{$table}`";
    $fields = array_keys($arr[0]);
    $q.="(`".implode("`,`",$fields)."`)VALUES (:"
        .implode(",:",$fields).")";
    $stmt = db_getConnection()->prepare($q);
    foreach ($arr as $a){
        $stmt->execute($a);
    }
}

function db_selectAll(string $table){
    $stmt = db_getConnection()->query("SELECT * FROM `{$table}`");
    return $stmt->fetchAll();
}

function db_selectPage(string $table,int $page,int $cpp){
    $offset = ($page-1)*$cpp;
    $q = "SELECT * FROM `{$table}` LIMIT {$cpp} OFFSET {$offset} ORDER BY `id` DESC";
    $stmt = db_getConnection()->query($q);
    return $stmt->fetchAll();
}

function db_getCount($table):int{
    $q = "SELECT count(*) FROM `{$table}`";
    return (int)(db_getConnection()->query($q)->fetchColumn());
}