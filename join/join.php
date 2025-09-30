<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>회원가입</title>
</head>
<body>
  <form id="joinForm" action="joinProcess.php" method="post">
    <input type="text" name="usr_idea" id="usr_idea" minlength="10" maxlength="33" placeholder="아이디" required>
    <input type="password" name="usr_pw" id="usr_pw" minlength="10" maxlength="33" placeholder="비밀번호" required>
    <input type="text" name="usr_name" id="usr_name" minlength="2" maxlength="33" placeholder="이름" required>
    <input type="text" name="usr_adr" id="usr_adr" minlength="5" maxlength="255" placeholder="주소(255자)" required>
    <input type="text" name="usr_callNum" id="usr_callNum" minlength="11" placeholder="전화번호 (01012345678)"
           pattern="^01[0-9]{8,9}$" required>
    <div>
      <label><input type="radio" name="gender" value="man" required> 남</label>
      <label><input type="radio" name="gender" value="woman"> 여</label>
    </div>
    <input type="submit" value="회원가입">
  </form>

 
</body>
</html>
