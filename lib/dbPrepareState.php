<?php


function dbPrepareState($sql, $conn, $types = null, ...$params){
    $stmt = $conn -> prepare($sql);
    
    if(!$stmt){
        throw new Exception("Prepare failed: " . $conn->error);
    }

    if($types && $params){
        $stmt -> bind_param($types, ...$params);
    }
   
    if($stmt -> execute()){
        echo "성공";
    }
    else if(!$stmt->execute()){
       throw new Exception("execute failed: " . $conn->error);
    }

    return $stmt -> get_result();
}


?>