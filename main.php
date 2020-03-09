<?php
   session_start();
?>

<!DOCTYPE html>

<HTML>

<HEAD>
<meta http-equiv="content-type" content="text/html; charset=utf-8">

<title> KU Sharing </title>
<link rel="shortcut icon" href="icon1.ico" type="image/vnd.microsoft.icon">
<style>
   html
   {
      min-height: 100%;
   }
   *
   {
      margin:0;
      padding:0;
   }
   body
   {
      background: linear-gradient(#9ad4fc,#dcffb8);
   }
   #main_body
   {
      width:1024px;
      height:768px;
      margin: 0 auto;
   }
   #box1 /* 로고 박스 */
   {
      width:1024px;
      height:300px;
      text-align: center;
      color:white;
      font-size: 30px;
      font-family: "a포스터m";
   }
   #box2 /* 로그인 겉 박스 */
   {
      width:768px;
      height:468px;
      text-align: center;
      color:white;
      padding-left:256px;
      font-size: 30px;
      font-family: "a포스터m";
   }
   #box3 /* 입력창 박스 */
   {
      width:400px;
      height: 113px;
      padding-left: 78px;
   }
   #login_box
   {
      width:500px;
      height:350px;
      background: rgba(255,255,255,0.4);
      border-radius: 25px;
      text-align: center;
      padding-top: 10px;
   }
   #B1 /* 회원가입 버튼 */
   {
      width: 100px; height: 40px;
      padding: 5px 40px 5px 40px;
      border-radius: 15px 0 0 15px;
      border-right: none;
      color: #555555;
      font-size: 20px;
      border:3px solid #555555;
      font-family: "a포스터m";
   }
   #B1:hover
   {
      background:white;
   }
   #T_1 /*폰트 양식*/
   {
      font-family: "a옛날사진관5";
      font-size:28px;
      color:#555555;
      
   }
   #T_2 /* 하단 konkuk univ web 박스*/
   {
      padding: 10px;
      font-family: "a옛날사진관4";
      font-size:13px;
      color:#555555;
   }
   #T_3 /* 아이디/비밀번호 박스 */
   {
      margin:0;
      padding: 13px 15px 20px 15px;
      width: 70px;
      height: 8px;
      border: none;
      border-right: none;
      border-radius: 30px 0 0 30px;
      font-family: "a옛날사진관3";
      font-size: 15px;
      background: #2ca9b4;
      color:white;
      float:left;
   }
   input[type="text"]
   {
      padding: 10px 10px 10px 20px;
      width:200px;
      height: 15px;
      border: 3px solid #2ca9b4;
      border-left: none;
      border-radius: 0 30px 30px 0;
      font-family: "a옛날사진관3";
      font-size: 15px;
      background: none;
      float:left;
   }
   input[type="password"]
   {
      padding: 10px 10px 10px 20px;
      width:200px;
      height: 15px;
      border: 3px solid #2ca9b4;
      border-left: none;
      border-radius: 0 30px 30px 0;
      font-family: "a옛날사진관3";
      font-size: 15px;
      background: none;
      float:left;
   }
   input[type="submit"]
   {
      width: 160px; height: 36px;
      border-radius: 0px 15px 15px 0px;
      border-left: none;
      color: white;
      font-size: 20px;
      border:3px solid #555555;
      background: #555555;
      font-family: "a포스터m";
   }
   input[type="submit"]:hover
   {
      background:white;
      color:#555555;
   }
   a:link
   {
      text-decoration:none;
   }
</style>
</HEAD>
<body>
   <div id="main_body"> <!--기본 틀-->
      
      <div id="box1"> <!--로고-->
         <br><br><img src="KUsharing1.png" width=400 alter="logo">
         <br> 
      </div>

      <form method="post", action="loginCheck.php">
      <div id="box2"><!--로그인-->
         <div id="login_box">
            <span id="T_1"><br>KUS Member <b>Login</b></span><br><br>
            <div id="box3">
               <div id="T_3"> 아이디 </div><input type="text" name="userID" required><br>
               <br>
               <div id="T_3">비밀번호</div><input type="password" name="password" required><br>
            </div>
            <br>
            <a href="join.php"><botton type="button" id="B1">회원가입</botton></a><input type="submit" value="로 그 인">
         </div>
         <p id="T_2">@Konkuk University Sharing Web</p></div>
      </form>
      </div>
</body>

</HTML>