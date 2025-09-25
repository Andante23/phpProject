<?php


function dbPrepareState($sql, $conn, $types = null, ...$params){
    $stmt = $conn -> prepare($sql);
   
    if($types && $params){
        $stmt -> bind_param($types, ...$params);
    }
   
    $stmt -> execute();
    return $stmt -> get_result();
}


?>