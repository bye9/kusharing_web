<?php
   session_start();
?>

<?php 
   $con=mysqli_connect("localhost", "root", "password", "kusDB") or die("MYSQL 접속 실패!!");

   $userID=$_POST["userID"];
   $password1=$_POST["password1"];
   $password2=$_POST["password2"];
   $name=$_POST["name"];
   $age=$_POST["age"];
   $gender=$_POST["gender"];
   $nickname=$_POST["nickname"];
   $email=$_POST["email"];
   $phone=$_POST["phone"];

   $sql="select * from user where userID='".$userID."'";

   $ret=mysqli_query($con, $sql);
   $num_record=mysqli_num_rows($ret);

   if($num_record)
   {
      echo ("<script>alert('이미 사용중인 아이디입니다.'); history.back();</script>");
   }
   else if(strlen($password1)<6 and strlen($password2)<6 ) {
      echo ("<script>alert('비밀번호 길이를 확인해주세요.'); history.back();</script>");
   }
   else {
   
      if ($password1 != $password2) {
       echo ("<script>alert('비밀번호를 정확히 입력해주세요.'); history.back();</script>");
      }
      else {
        $password = password_hash($password1, PASSWORD_DEFAULT);

        $sql="insert into user values('".$userID."','".$password."','".$name;
        $sql=$sql."',".$age.",'".$gender."','".$nickname."','".$email."','".$phone."')";

         mysqli_query($con, $sql);
      }
   }
      mysqli_close($con);
?>

<!DOCTYPE html>

<HTML>

<HEAD>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title> KU Sharing :: 가입완료 </title>
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
      margin:0;
      padding:0;
      background: linear-gradient(#9ad4fc,#dcffb8);
   }
   #main_body
   {
      width:1024px;
      height:768px;
      margin: 0 auto;
      /*border:solid 1px #EEEEEE;*/

   }
   #box1
   {
      width:1024px;
      height:300px;
      text-align: center;
      color:white;
      font-size: 30px;
      font-family: "a포스터m";
   }
   #box2
   {
      width:768px;
      height:468px;
      text-align: center;
      color:white;
      padding-left:256px;
      font-size: 30px;
      font-family: "a포스터m";
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
   #B1
   {
      width: 200px; height: 40px;
      padding: 5px 40px 5px 40px;
      /*background:radial-gradient(#9ad4fc,#dcffb8);*/
      border-radius: 15px;
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
   #B2
   {
      width: 200px; height: 40px;
      padding: 5px 45px 5px 45px;
      /*background:radial-gradient(#9ad4fc,#dcffb8);*/
      border-radius: 15px;
      border-left: none;
      color: white;
      font-size: 20px;
      border:3px solid #555555;
      background: #555555;
      font-family: "a포스터m";
   }
   #B2:hover
   {
      background:white;
      color:#555555;
   }
   #T_1
   {
      font-family: "a옛날사진관5";
      font-size:28px;
      color:#555555;
      text-shadow: 5px 5px 5px white;
      
   }
   #T_2
   {
      padding: 10px;
      font-family: "a옛날사진관4";
      font-size:13px;
      color:#555555;
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
   }
   input[type="submit"]
   {
      margin:0;
      padding: 0 15px 0 20px;
      height: 41px;
      border: none;
      border-right: none;
      border-radius: 30px 0 0 30px;
      font-family: "a옛날사진관3";
      font-size: 15px;
      background: #2ca9b4;
      color:white;
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

      <div id="box2"><!--로그인-->
         <p id="login_box">
            <span id="T_1"><br><br><b>KUS</b> Member<br><br>가입을 축하드립니다!</span><br><br>
            
            <br>
            <a href="main.php"><botton type="button" id="B2">로 그 인</botton></a>
         </p>
         <p id="T_2">@Konkuk University Sharing Web</p></div>
      </div>
   </div>
</body>

</HTML>