<?php
session_start();


$userID = $_POST["userID"];
$password = $_POST["password"];

$con=mysqli_connect("localhost", "root", "password", "kusDB") or die("MYSQL 접속 실패!!");

$sql ="select userID, password from user";
$ret = mysqli_query($con, $sql);



while($row = mysqli_fetch_array($ret)) {

$hash = $row['password'];

if ($userID==$row['userID'] && password_verify($password, $hash)) 
{
	$_SESSION['userID']=$userID;
	echo ("<script>alert('로그인되었습니다!'); location.href='list.php';</script>");
	exit;
}

}


echo ("<script>alert('아이디 또는 패스워드가 틀렸습니다.'); history.back();</script>");



mysqli_close($con);

?> 


