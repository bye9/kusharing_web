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
<title> KU Sharing :: 내정보 수정 </title>
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
	#box1 /* 로고 박스 */
	{
		width:1024px;
		height:300px;
		text-align: center;
		color:white;
		font-size: 30px;
		font-family: "a포스터m";
	}
	#box2 /* 글 박스 */
	{
		width:768px;
		height:724px;
		text-align: center;
		color:white;
		padding-left: 62px;
		font-size: 30px;
		font-family: "a포스터m";
	}
	#box3 /* 하단 버튼 박스 */
	{
		width:700px;
		height:50px;
		text-align: center;
		color:white;
		padding-left: 80px;
		padding-top: 10px;
	}
	#article /* 반투명 박스 */
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
	#B2 /* 돌아가기 버튼 */
	{
		width: 100px; height: 30px;
		padding: 5px 45px 5px 45px;
		border-radius: 0px 15px 15px 0px;
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
	#B3
	{
		padding: 10px 10px 10px 20px;
		width:300px;
		height: 15px;
		border: 0px;
		border-radius: 30px;
		font-family: "a옛날사진관3";
		font-size: 20px;
		background: none;
	}
	#T_2 /*하단 건국웹 박스 */
	{
		width: 870px;
		padding: 10px;
		font-family: "a옛날사진관4";
		font-size:13px;
		color:#555555;
		text-align: right;
	}
	#T_3 /* 글 양식 */
	{
		color: red;
	}
	input[type="text"]
	{
		padding: 10px 10px 10px 20px;
		width:300px;
		height: 15px;
		border: 3px solid #2ca9b4;
		border-radius: 30px;
		font-family: "a옛날사진관3";
		font-size: 20px;
		background: none;
	}
	input[type="password"]
	{
		padding: 10px 10px 10px 20px;
		width:300px;
		height: 15px;
		border: 3px solid #2ca9b4;
		border-radius: 30px;
		font-family: "a옛날사진관3";
		font-size: 20px;
		background: none;
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
	}
	input[type="submit"]:hover
	{
		background:white;
	}
	input[type="radio"]
	{
		
		height: 20px;
		width: 20px;
		
		background: #2ca9b4;
		color:white;
	}
	

	table
	{
		width:740px;
		padding-left: 80px;
	}
	td
	{
		text-align: left;
		padding: 8px 30px 8px 40px;
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
			<br><br><img src="KUsharing1.png" width=400 alter="logo">
			<br> 
		</div>
		
		<div id="box2"><!--글박스-->
			<div id="article"> <!-- 반투명 박스 -->
				<p id="title_box">
					KU Sharing 내정보 수정
				</p>
				<br>
				<form method="post" action="myPageComplete.php">
					<table>
						<tr>
						<td>■ 아 이 디</td>
						<td><input type="text" id="B3" name="userID" READONLY value=<?php echo $_SESSION['userID']?> ></td>
						</tr>
						<tr>
							<td>■ 비 밀 번 호</td>
							<td><input type="password" name="password1" maxlength="10" placeholder="최소 6자 / 최대 10자"></td>
						</tr>
						<tr>
							<td>■ 비밀번호확인</td>
							<td><input type="password" name="password2"  maxlength="10" placeholder="최소 6자 / 최대 10자"></td>
						</tr>
						<tr>
							<td>■ 이 름 </td>
							<td><input type="text" id="B3" name="name" READONLY value=<?php echo $name ?>></td>
						</tr>
						<tr>
							<td>■ 나 이 <span id="T_3">*</span></td>
							<td><input type="text" name="age" required value=<?php echo $age ?> ></td>
						</tr>
						<tr>
							<td>■ 성 별 </td>
							<td><input type="text" id="B3" name="gender" readonly value=<?php echo $gender ?> ></td>
						</tr>
						<tr>
							<td>■ 닉 네 임 <span id="T_3">*</span></td>
							<td><input type="text" name="nickname" required value=<?php echo $nickname ?> ></td>
						</tr>
						<tr>
							<td>■ 이 메 일 </td>
							<td><input type="text" id="B3" name="email" value=<?php echo $email ?> ></td>
						</tr>
						<tr>
							<td>■ 전 화 번 호 <span id="T_3">*</span></td>
							<td><input type="text" name="phone"  required placeholder="예) 010-0000-1234" value=<?php echo $phone ?>></td>
						</tr>
					</table>
				<dir id="box3">
					<input type="submit" value="수정완료"></form><a href="javascript:history.back()"><botton type="button" id="B2">돌아가기</botton></a>
				</dir>
			</div>
			<p id="T_2">@Konkuk University Sharing Web</p>
		</div>
	</div>
</body>

</HTML>