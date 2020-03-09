<?php
	session_start();

	if(!isset($_SESSION['userID']))
		echo ("<script>alert('로그인되어있는 아이디가 없습니다.'); history.back();</script>");

	$con=mysqli_connect("localhost", "root", "password", "kusDB") or die("MYSQL 접속 실패!!");
	$sql="select * from user where userID='".$_SESSION['userID']."'";

	$ret=mysqli_query($con, $sql);
	$row=mysqli_fetch_array($ret);
	$name=$row['name'];
	$age=$row['age'];
	$gender=$row['gender'];
	$nickname=$row['nickname'];
	$email=$row['email'];
	$phone=$row['phone'];

?>


<!DOCTYPE html>

<HTML>

<HEAD>
<meta charset = "utf-8">
<title> KU Sharing :: 마이페이지 </title>
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
		height:1060px;
		margin: 0 auto;
	}
	#box1/* 로고 박스*/
	{
		width:1024px;
		height:300px;
		text-align: center;
		color:white;
		font-size: 30px;
		font-family: "a포스터m";
	}
	#box2/*글 박스*/
	{
		width:768px;
		height:724px;
		text-align: center;
		color:white;
		padding-left: 62px;
		font-size: 30px;
		font-family: "a포스터m";
	}
	#box3/*버튼 박스*/
	{
		width:768px;
		height:40px;
		text-align: center;
		color:white;
		padding-left: 250px;
		font-size: 30px;
		font-family: "a포스터m";
	}
	#article/*반투명 박스*/
	{
		width:840px;
		height:664px;
		background: rgba(255,255,255,0.4);
		border-radius: 25px;
		text-align: center;
		padding:30px;
	}
	#title_box
	{
		width:740px;
		height:50px;
		background: none;
		border-left: 20px solid #2ca9b4;
		border-bottom: 2px solid #2ca9b4;
		text-align: left;
		padding:10px 40px 2px 40px;
		font-family: "a옛날사진관5";
		font-size: 30px;
		color:#555555;
		text-shadow: 3px 3px 5px white;
	}
	#B2 /*돌아가기 버튼*/
	{
		width: 80px; height: 22px;
		padding: 3px 45px 5px 45px;
		border-radius: 0px 15px 15px 0px;
		border-left: none;
		color: white;
		font-size: 20px;
		border:3px solid #555555;
		background: #555555;
		font-family: "a포스터m";
		float:left;
	}
	#B2:hover
	{
		background:white;
		color:#555555;
	}
	#T_2/*하단 쉐어링 웹 박스*/
	{
		width: 870px;
		padding: 10px;
		font-family: "a옛날사진관4";
		font-size:13px;
		color:#555555;
		text-align: right;
	}
	#T_3/*글 양식*/
	{
		color: red;
	}
	input[type="submit"]
	{
		width: 170px; height: 36px;
		border-radius: 15px 0 0 15px;
		border-right: none;
		color: #555555;
		font-size: 20px;
		border:3px solid #555555;
		font-family: "a포스터m";
		background:none;
		float:left;
	}
	input[type="submit"]:hover
	{
		background:white;
	}
	table
	{
		width:740px;
		padding-left: 80px;
	}
	td
	{
		text-align: left;
		padding: 20px 30px 20px 40px;
		color:#555555;
		font-family: "a옛날사진관4";
		font-size: 25px;
		text-decoration: bold;
	}
	a:link
	{
		text-decoration: none;
	}
</style>
</HEAD>
<body>
	<div id="main_body"> <!--기본 틀-->
		
		<div id="box1"> <!--로고-->
			<br><br><a href="list.php"><img src="KUsharing1.png" width=400 alter="logo"></a>
			<br> 
		</div>
		
		<div id="box2"><!--로그인-->
			<div id="article"><!-- 반투명 박스-->
				<p id="title_box">
					KU Sharing 마이페이지
				</p>
				<br>
				<form method="post" action="myPageModify.php">
				<table>
					<tr>
						<td>■ 아 이 디</td>
						<td><b><?php echo $_SESSION['userID'] ?></b></td>
					</tr>
					<tr>
						<td>■ 이 름</td>
						<td><b><?php echo $name ?></b></td>
					</tr>
					<tr>
						<td>■ 나 이</td>
						<td><b><?php echo $age ?></b></td>
					</tr>
					<tr>
						<td>■ 성 별</td>
						<td><b><?php echo $gender ?></b></td>
					</tr>
					<tr>
						<td>■ 닉 네 임 </td>
						<td><b><?php echo $nickname ?></b></td>
					</tr>
					<tr>
						<td>■ 이 메 일</td>
						<td><b><?php echo $email ?></b></td>
					</tr>
					<tr>
						<td>■ 전 화 번 호</td>
						<td><b><?php echo $phone ?></b></td>
					</tr>
				</table>
				<br>
				<div id="box3">
					<a href="myPageModify.php"><input type="submit" value="수   정"></a></form><a href="list.php"><botton type="button" id="B2">돌아가기</botton></a>
				</div>
			</div>
		</div>
			<p id="T_2">@Konkuk University Sharing Web</p>
	
	</div>
</body>

</HTML>