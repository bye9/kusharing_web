<?php
	session_start();

	$con=mysqli_connect("localhost", "root", "password", "kusDB") or die("MYSQL 접속 실패!!");

   $password1=$_POST["password1"];
   $password2=$_POST["password2"];
   $age=$_POST["age"];
   $gender=$_POST["gender"];
   $nickname=$_POST["nickname"];
   $email=$_POST["email"];
   $phone=$_POST["phone"];

   $count=strlen($password1);

   if(strlen($password1)!=0 and strlen($password2)!=0) {
   	if ($password1 != $password2) 
   		echo ("<script>alert('비밀번호를 다시 확인해주세요.'); history.back();</script>");
   	else if(strlen($password1)<6 and strlen($password2)<6 ) 
      echo ("<script>alert('비밀번호 길이를 확인해주세요.'); history.back();</script>");
    else {
        $password = password_hash($password1, PASSWORD_DEFAULT);  
        $sql="update user set password ='".$password."' where userID='".$_SESSION['userID']."' ";
        mysqli_query($con, $sql);

	$sql="update user set age ='".$age."' where userID='".$_SESSION['userID']."' ";
        mysqli_query($con, $sql);
    $sql="update user set nickname ='".$nickname."' where userID='".$_SESSION['userID']."' ";
        mysqli_query($con, $sql);
    $sql="update user set phone ='".$phone."' where userID='".$_SESSION['userID']."' ";
        mysqli_query($con, $sql);

	echo "<script>alert('수정이 완료되었습니다.'); location.href='myPage.php';</script>";
	mysqli_close($con);
      }
     }
   else if(strlen($password1)!=0 or strlen($password2)!=0)
	echo ("<script>alert('비밀번호를 둘 다 입력해주세요.'); location.href='myPageModify.php';</script>");

   else if(strlen($password1)==0 and strlen($password2)==0) {
   	$sql="update user set age ='".$age."' where userID='".$_SESSION['userID']."' ";
        mysqli_query($con, $sql);
    $sql="update user set nickname ='".$nickname."' where userID='".$_SESSION['userID']."' ";
        mysqli_query($con, $sql);
    $sql="update user set phone ='".$phone."' where userID='".$_SESSION['userID']."' ";
        mysqli_query($con, $sql);

	echo "<script>alert('수정이 완료되었습니다.'); location.href='myPage.php';</script>";
	mysqli_close($con);
	}
?>
