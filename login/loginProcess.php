<?php

include("../db.php");



if($_SERVER['REQUEST_METHOD'] != 'POST'){
    
    echo "잘못된 접근입니다.";
    exit;
}else{


    $usr_idea = $_POST['usr_idea'];
    $usr_pw = $_POST['usr_pw'];



      include("../lib/dbPrepareState.php");

$sql = "SELECT * FROM users WHERE usr_idea = ? AND usr_pw = ? ";

$result = dbPrepareState($sql, $conn, "ss", $usr_idea, $usr_pw);




if(mysqli_num_rows($result) > 0){

    
    $row = mysqli_fetch_assoc($result);
    
    if($usr_idea !== $row['usr_idea'] || $usr_pw !== $row['usr_pw']){
        echo "<script>alert('아이디 또는 비밀번호가 틀렸습니다.'); location.href='login.php';</script>"; 
        exit;
    }else{

        session_start(); 
          $_SESSION['usr_idea'] = $row['usr_idea'];
          $_SESSION['usr_name'] = $row['usr_name'];
    }


  
    echo "<script>alert('로그인 되었습니다.'); location.href='../index.php';</script>";         


}else{

       # 5그게 아니라면 , 로그인 페이지로 이동합니다.
    echo "<script>alert('아이디 또는 비밀번호가 틀렸습니다.'); location.href='login.php';</script>";                
}







}











?>