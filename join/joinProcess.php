<?php




   if($_SERVER['REQUEST_METHOD'] != 'POST')
   {
    
    echo "<script>alert('잘못된 접근입니다.'); location.href='../index.php';</script>";
    exit; //비정상적인 접근

    }else{



      $usr_idea = $_POST['usr_idea'];
      $usr_pw = $_POST['usr_pw'];
      $usr_name = $_POST['usr_name'];
      $usr_adr = $_POST['usr_adr'];
      $usr_callNum = $_POST['usr_callNum'];
   
       //예외 처리
      try {
        
         // db 연결
         include "../db/con.php" ;
         include "../lib/dbPrepareState.php";
      


         $result = dbPrepareState("INSERT INTO users (usr_idea, usr_pw, usr_name, usr_adr, usr_callNum) VALUES (?, ?, ?, ?, ?)", $conn, "sssss", $usr_idea, $usr_pw, $usr_name, $usr_adr, $usr_callNum);
         if($result){
            echo "<script>alert('회원가입이 완료되었습니다.'); location.href='../index.php';</script>";        
            $conn->close(); // DB 연결 종료 
         }else{
            echo "<script>alert('회원가입에 실패했습니다.'); location.href='join.php';</script>";         
         }

         $values = [
             $usr_idea,
             $usr_pw,
             $usr_name,
             $usr_adr,
             $usr_callNum
         ];

         // 스크립트 태그가 포함되어 있는지 확인  
         foreach ($values as $val  ) {
             // 해당 값에 스크립트 태그가 포함되어 있는지 확인
             if(preg_match('/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/i', $val)) {
                 throw new Exception('입력 값에 특수 문자가 포함되어 있습니다.');   
                 echo "<script>alert('입력 값에 특수 문자가 포함되어 있습니다.'); location.href='join.html';</script>";
             }
         }




         // 빈 값이 있는지 확인
         if(empty($usr_idea) || empty($usr_pw) || empty($usr_name) || empty($usr_adr) || empty($usr_callNum)) {
             throw new Exception('모든 필드를 채워주세요.');   
             echo "<script>alert('모든 필드를 채워주세요.'); location.href='join.html';</script>";
         }


         }catch (Exception $th)  // 오류 처리
        {
         echo "<script>alert('오류가 발생했습니다. 관리자에게 문의하세요.'); location.href='join.html';</script>";         
         error_log($th->getMessage());
        }


       }
?>