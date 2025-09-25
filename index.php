<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php

 include 'db/con.php';




   if(isset($_SESSION['user_id']) && isset($_SESSION['user_name']))
  {

     session_start();
    echo "안녕하세요" . $_SESSION['user_name'] . "님";
  }else
  {
 
    echo "
         <div>
            <a href='login/login.php'>로그인</a>
            <a href='join/join.php'>회원가입</a>
         </div>
         
    ";
   }

?> 
</body>
</html>





