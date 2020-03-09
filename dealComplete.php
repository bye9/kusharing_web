<?php
	session_start();

	$articlenum=$_POST["articlenum"];

	$con=mysqli_connect("localhost", "root", "password", "kusDB") or die("MYSQL 접속 실패!!");
	$sql="select * from user u, product p where u.userID=p.lender and proID='".$articlenum."'";
	$ret=mysqli_query($con, $sql);
	$row=mysqli_fetch_array($ret);

	$lender=$row['lender'];
	$price=$row['price'];
	$userID=$row['userID'];

	if($lender==$_SESSION['userID'])
		echo "<script>alert('작성자는 해당글을 거래하실 수 없습니다..'); location.href='list.php';</script>";

	else{

	
		$name=$row['name'];
		$phone=$row['phone'];

		if($price==null){
			$sql="update product p set receiver='".$_SESSION['userID']."' where proID='".$articlenum."'";
			$ret=mysqli_query($con, $sql);
		}
		else{
			$sql="update product p set borrower='".$_SESSION['userID']."' where proID='".$articlenum."'";
			$ret=mysqli_query($con, $sql);
		}
	}

?>

<!DOCTYPE html>

<HTML>

<HEAD>
<meta charset = "utf-8">
<title> KU Sharing :: 거래완료 </title>
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
	#box1/*로고 박스*/
	{
		width:1024px;
		height:300px;
		text-align: center;
		color:white;
		font-size: 30px;
		font-family: "a포스터m";
	}
	#box2/*글박스*/
	{
		width:768px;
		height:468px;
		text-align: center;
		color:white;
		padding-left:200px;
		font-size: 30px;
		font-family: "a포스터m";
	}
	#article/*반투명 박스*/
	{
		width:600px;
		height:350px;
		background: rgba(255,255,255,0.4);
		border-radius: 25px;
		text-align: center;
		padding-top: 10px;
	}
	#B2/*돌아가기 버튼*/
	{
		width: 200px; height: 40px;
		padding: 5px 45px 5px 45px;
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
	#T_1/*글 양식*/
	{
		font-family: "a옛날사진관5";
		font-size:28px;
		color:#555555;
		text-shadow: 5px 5px 5px white;
		
	}
	#T_2/*하단 쉐어링 웹 박스*/
	{
		padding: 10px;
		padding-left: 330px;
		width:300px;
		font-family: "a옛날사진관4";
		font-size:13px;
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
		
		<div id="box2"><!--글 박스-->
			<p id="article"><!--반투명 박스-->
				<span id="T_1"><br><br><b>KUS</b> 거래가 완료되었습니다.<br><br>작성자 <b>"<?php echo $userID."(".$name.")" ?>"</b>님 <br>전화번호는<b>"<?php echo $phone ?>"</b> 입니다.</span><br>
				
				<br>
				<a href="list.php"><botton type="button" id="B2">돌아가기</botton></a>
			</p>
			<p id="T_2">@Konkuk University Sharing Web</p></div>
		</div>
	</div>
</body>

</HTML>