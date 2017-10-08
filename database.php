<?php

//Deleta registros
function DBDelete($tabela, $where = null) {
    $tabela = DB_PREFIX . '_' . $tabela;
    $where = ($where) ? "WHERE $where" : null;
    $query = "DELETE FROM $tabela $where";

    echo $query;

    return DBExecute($query);
}

//Altera registros
function DBUpdate($tabela, array $data, $where = null) {
    foreach ($data as $key => $value) {
        $fields[] = "{$key} = '{$value}'";
    }
    $fields = implode(', ', $fields);
    $tabela = DB_PREFIX . '_' . $tabela;
    $where = ($where) ? "WHERE $where" : null;
    $query = "UPDATE $tabela SET $fields $where";

    return DBExecute($query);
}

//LER registros
function DBRead($table, $params = null, $fields = '*') {
    $table = DB_PREFIX . '_' . $table;
    $params = ($params) ? " params" : null;

    $query = "SELECT $fields FROM $table{$params}";
    $result = DBExecute($query);

    while($row = mysqli_fetch_array($result)){
        $data[] = $row;
    }
    return $data;
}

//LER registro
function DBReadOne($table, $where = null, $fields = '*') {
    $table = DB_PREFIX . '_' . $table;
    $where = ($where) ? "WHERE $where" : null;

    $query = "SELECT $fields FROM $table $where";
    
    $result = DBExecute($query);

    $data = mysqli_fetch_assoc($result);
        
    return $data;
}

//Grava registros
function DBCreate($table, array $data) {
    $table = DB_PREFIX . '_' . $table;
    $data = DBEscape($data);

    $fields = implode(', ', array_keys($data));
    $values = "'" . implode("', '", $data) . "'";

    $query = "INSERT INTO $table ($fields) VALUES ($values)";

    return DBExecute($query);
}

//Executa Querys
function DBExecute($query) {
    $link = DBConnect();

    $result = mysqli_query($link, $query) or die(mysqli_error($link));

    DBClose($link);
    return $result;
}