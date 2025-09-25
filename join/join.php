<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


    <form   action="join/joinProcess.php" method="post">
        <input type="text" name="usr_idea" placeholder="아이디" minlength=10 maxlength=33 required>
        <input type="password" name="usr_pw" placeholder="비밀번호" minlength=10 maxlength=33 required>
        <input type="text" name="usr_name" placeholder="이름" minlength=10 maxlength=33 required>
        <input type="text" name="usr_adr" placeholder="주소" minlength=10 maxlength=33  required>
        <input type="text" name="usr_callNum" placeholder="전화번호" minlength=15 required>
        <div>
             <input type="radio" name="man" valued="man" required>
            <input type="radio" name="woman" valued="woman" required>
       </div>
       
        <input type="submit" value="회원가입">    
    </form>


</body>
</html>