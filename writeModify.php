<?php
	session_start();

	$articlenum=$_POST["articlenum"];

	$con=mysqli_connect("localhost", "root", "password", "kusDB") or die("MYSQL 접속 실패!!");
	$sql="select * from product where proID='".$articlenum."'";

	$ret=mysqli_query($con, $sql);
	$row=mysqli_fetch_array($ret);
	$proName=$row['proName'];
	$cat=$row['cat'];
	$content=$row['content'];
	$price=$row['price'];
	$lender=$row['lender'];

	if($_SESSION['userID']!=$lender)
		echo ("<script>alert('수정권한이 없습니다.'); location.href='list.php';</script>");



	$sql="select * from photo where photoNum='".$articlenum."'";
	$ret=mysqli_query($con, $sql);
	$num_record=mysqli_num_rows($ret);


	if($num_record!=0)
	{
	$row=mysqli_fetch_array($ret);			
	$photoSource=$row['photoSource'];
	}



?>

<!DOCTYPE html>

<HTML>

<HEAD>
<meta charset = "utf-8">
<title> KU Sharing :: 글수정 </title>
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
		height:1300px;
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
		height:1000px;
		text-align: center;
		color:white;
		padding-left: 62px;
		font-size: 30px;
		font-family: "a포스터m";
	}
	#box3/* 게시글 박스*/
	{
		width:790px;
		height:670px;
		background: rgba(85,85,85,0.2);
		border-radius: 25px;
		text-align: center;
		padding:25px;
	}
	#article/* 반투명 박스*/
	{
		width:840px;
		height:900px;
		background: rgba(255,255,255,0.4);
		border-radius: 25px;
		text-align: center;
		padding:30px;
	}
	#title_box1
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
		float: left;
	}
	#in_box0 /*제품명*/
	{
		width:70px;
		height:30px;
		font-family: "a옛날사진관5";
		font-size: 20px;
		text-align: left;
		color: #555555;
		padding: 2px 0px 4px 5px;
		border-bottom: 2px solid #555555;
		float:left;
	}
	#in_box1 /*제품명 내용*/
	{
		width:320px;
		height: 30px;
		font-family: "a옛날사진관4";
		font-size: 20px;
		text-align: left;
		color: #555555;
		padding: 2px 0px 4px 10px;
		border-bottom: 2px solid #555555;
		float:left;
	}
	#in_box2 /*카테고리 내용*/
	{
		width:280px;
		height: 30px;
		font-family: "a옛날사진관4";
		font-size: 17px;
		text-align: left;
		color: #555555;
		padding: 2px 0px 4px 5px;
		border-bottom: 2px solid #555555;
		float:left;
	}
	#in_box3 /*카테고리*/
	{
		width:80px;
		height:30px;
		font-family: "a옛날사진관5";
		font-size: 17px;
		text-align: left;
		color: #555555;
		padding: 2px 0px 4px 5px;
		border-bottom: 2px solid #555555;
		float:left;
	}
	#in_box6 /* 가격 */
	{
		width:150px;
		height:30px;
		font-family: "a옛날사진관5";
		font-size: 20px;
		text-align: right;
		color: #555555;
		padding: 2px 0px 4px 5px;
		float:left;
	}
	#in_box7 /* 가격 내용 */
	{
		width:180px;
		height:30px;
		font-family: "a옛날사진관4";
		font-size: 20px;
		text-align: left;
		color: #555555;
		padding: 2px 0px 4px 5px;
		float:left;
	}
	#in_box8 /* 파일입력 박스 */
	{
		width:320px;
		height:30px;
		font-family: "a옛날사진관5";
		font-size: 20px;
		text-align: left;
		color: #555555;
		padding: 2px 0px 4px 5px;
		
		float:left;
	}
	#in_box9 /*공유마감날짜*/
	{
		width:130px;
		height:30px;
		font-family: "a옛날사진관5";
		font-size: 19px;
		text-align: left;
		color: #555555;
		padding: 14px 0px 2px 5px;
		float:left;
	}
	#in_box11 /*마감날짜 내용*/
	{
		width:500px;
		height: 30px;
		font-family: "a옛날사진관4";
		font-size: 17px;
		text-align: left;
		color: #555555;
		padding: 10px 0px 2px 5px;
		
		float:left;
	}
	#in_box12 /* 구매버튼 */
	{
		width:120px;
		height:45px;
		font-family: "a옛날사진관4";
		font-size: 20px;
		text-align: left;
		color: #555555;
		padding: 0;
		float:left;
	}
	#T_2/* 하단 쉐어링웹 박스*/
	{
		width: 870px;
		padding: 10px;
		font-family: "a옛날사진관4";
		font-size:13px;
		color:#555555;
		text-align: right;
	}
	#B3/*돌아가기 버튼*/
	{
		width: 100px; height: 40px;
		padding: 5px 40px 5px 40px;
		border-radius: 15px;
		color: #555555;
		font-size: 20px;
		border:3px solid #555555;
		background: none;
		font-family: "a포스터m";
	}
	#B3:hover
	{
		background:white;
		color:#555555;
	}
	#B4/*작성완료 버튼*/
	{
		width: 150px; height: 40px;
		padding: 5px 20px 5px 20px;
		border-radius: 30px;
		color: white;
		font-size: 20px;
		border:3px solid #2ca9b4;
		background: #2ca9b4;
		font-family: "a포스터m";
	}
	#B4:hover
	{
		background:white;
		color:#555555;
	}
	#B5/*제품명 입력*/
	{
		width:280px;
		height: 20px;
		font-size: 18px;
		color:#555555;
		border: 2px solid #2ca9b4;
		background: none;
		padding-left:10px;
		padding-right: 10px;
		border-radius: 30px;
	}
	#B6/*카테고리 입력*/
	{
		width:200px;
		height: 20px;
		font-size: 18px;
		color:#555555;
		border: 2px solid #2ca9b4;
		background: none;
		padding-left:10px;
		padding-right: 10px;
		border-radius: 30px;
	}
	#B7/*선택 창*/
	{
		width:60px;
		height: 30px;
		font-size: 15px;
		color:#555555;
		border: 2px solid #2ca9b4;
		background: none;
		padding-left:10px;
		padding-top: 0;
		border-radius: 30px;
	}
	#B8/*내용입력*/
	{
		width:745px;
		height: 450px;
		font-family: "a옛날사진관3";
		font-size: 16px;
		text-align: left;
		color: #555555;
		padding: 20px;
		border: 2px solid #2ca9b4;
		border-radius: 20px;
		background: none;
	}
	#B9/*가격 입력*/
	{
		width:150px;
		height: 20px;
		font-size: 18px;
		color:#555555;
		border: 2px solid #2ca9b4;
		background: none;
		padding-left:10px;
		padding-right: 10px;
		border-radius: 30px;
	}
	#B10/*파일 입력*/
	{
		width:200px;
		height: 30px;
		font-size: 18px;
		color:#555555;
		border: 2px solid #2ca9b4;
		background: none;
		padding-left:10px;
		padding-right: 10px;
		border-radius: 30px;
	}
	#B11/*년도 입력*/
	{
		width:80px;
		height: 25px;
		font-size: 15px;
		color:#555555;
		border: 2px solid #2ca9b4;
		background: none;
		padding-left:10px;
		padding-top: 0;
		border-radius: 30px;
	}
	input[type="submit"]:hover
	{
		color:white;
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
		
		<div id="box2"><!--글-->
			<div id="article">
				<div id="title_box1">
					게 시 글 수 정
				</div>
				<br><br><br>
				<div id=box3>
				<form method="post" action="writeModifyComplete.php">
					<div id="in_box0">제품명 | </div>
					<div id="in_box1"><input type="text" id="B5" name="proName" required value=<?php echo $proName ?> ></div>
					<div id="in_box3">카테고리 | </div>
					<div id="in_box2"><input type="text" id="B6" name="cat" required placeholder="예) 노트북" value=<?php echo $cat ?>></div>
					<br>
					<br><br>
					<textarea id="B8" placeholder="내용" name="content" required><?php echo $content ?></textarea><br><br>
					<div id="in_box8">
					</div>
					<div id="in_box12"><input type="submit" value="수정완료" id="B4"></div>
					<?php if($price!=null) {
                  	?>
					<div id="in_box6">가격 | ₩</div>
					<div id="in_box7"><input type="text" id="B9" name="price" placeholder="기부는 숫자 입력X"></div> <?php } ?>
				</div>
				<input type="hidden" name="articlenum" value=<?php echo $articlenum ?>>
				</form>
				<br>

			</div>
			<p id="T_2">@Konkuk University Sharing Web</p>
		</div>
	</div>
</body>

</HTML>