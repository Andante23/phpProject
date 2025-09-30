<?php

  if($_SERVER['REQUEST_METHOD'] != 'POST'){
    
    echo "잘못된 접근입니다.";
    exit;
 }else{


    $usr_idea = $_POST['usr_idea'];
    $usr_pw = $_POST['usr_pw'];



 try{   
      include("../db.php");
      include("../lib/dbPrepareState.php");
       $login_values = [
           $usr_idea,
           $usr_pw
         ];

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


        }else
        {
            echo "<script>alert('아이디 또는 비밀번호가 틀렸습니다.'); location.href='login.php';</script>";                
        }



       

         // 스크립트 태그가 포함되어 있는지 확인    
         foreach ($login_values as $val  ) {
               // 해당 값에 스크립트 태그가 포함되어 있는지 확인
              if(preg_match('/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/i', $val)) {
                echo "<script>alert('입력 값에 특수 문자가 포함되어 있습니다.'); location.href='login.php';</script>";
                exit;   
              }

            }       

            // 빈 값이 있는지 확인          
            if(empty($usr_idea) || empty($usr_pw)) {
                echo "<script>alert('모든 필드를 채워주세요.'); location.href='login.php';</script>";
                exit;   
            }





        }catch(Exception $e)
        {             
            error_log($e->getMessage());
            echo "<script>alert('오류가 발생했습니다. 관리자에게 문의하세요.'); location.href='login.php';</script>";
        }


}


      


?>