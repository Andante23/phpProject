<?php

include("../db.php");


if($_SERVER['REQUEST_METHOD'] != 'POST'){
    
    echo "잘못된 접근입니다.";
    exit;
}else{
  

        $usr_idea = $_POST['usr_idea'];
        $usr_pw = $_POST['usr_pw'];
        $usr_name = $_POST['usr_name'];
        $usr_adr = $_POST['usr_adr'];
        $usr_callNum = $_POST['usr_callNum'];

        
    include("../lib/dbPrepareState.php");
    
        $result = dbPrepareState($sql, $conn, "sssss", $usr_idea, $usr_pw,$usr_name ,$usr_adr , $usr_callNum);

        if(mysqli_num_rows($result)){ 
            echo "<script>alert('회원가입이 완료되었습니다.'); location.href='../login/login.php';</script>";
        }else{
            echo "<script>alert('회원가입에 실패했습니다.'); location.href='join.php';</script>";
        }



    }



?>