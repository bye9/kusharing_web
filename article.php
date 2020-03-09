<?php
	session_start();

	$con=mysqli_connect("localhost", "root", "password", "kusDB") or die("MYSQL 접속 실패!!");
	 
	$virtual=$_POST["virtual"];


	$sql="select * from product p, user u where p.lender=u.userID";
	$ret=mysqli_query($con, $sql);



		$count=1;
		while($count<=$virtual) {
			$row=mysqli_fetch_array($ret);
			$count++;
		}

		$proName=$row['proName'];
		$name=$row['name'];
		$userID=$row['userID'];
		$rDate=$row['rDate'];
		$proID=$row['proID'];
		$cat=$row['cat'];
		$deadDate=$row['deadDate'];
		$deadTime=$row['deadTime'];
		$content=$row['content'];
		$price=$row['price'];
		$borrower=$row['borrower'];
		$receiver=$row['receiver'];

		$sql="select * from photo where photoNum='".$proID."'";
		$ret=mysqli_query($con, $sql);
		$num_record=mysqli_num_rows($ret);


		if($num_record!=0)
		{
		$row=mysqli_fetch_array($ret);			
		$photoSource=$row['photoSource'];
		}


	if(isset($borrower) or isset($receiver))
	{
   		echo ("<script>alert('이미 거래완료되었습니다.'); history.back();</script>");		
	}
	
	if($price==null)
    	$share="[기부]"; 
    else $share="[공유]"; 
 
?>


<!DOCTYPE html>

<HTML>

<HEAD>
<meta charset = "utf-8">
<title> KU Sharing :: 게시글 </title>
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
	#box2/*글 박스*/
	{
		width:768px;
		height:1000px;
		text-align: center;
		color:white;
		padding-left: 62px;
		font-size: 30px;
		font-family: "a포스터m";
	}
	#box3 /*버튼 박스*/
	{
		width:790px;
		height:670px;
		background: rgba(85,85,85,0.2);
		border-radius: 25px;
		text-align: center;
		padding:25px;
	}
	#box4 /*버튼박스2*/
   {
      width:600px;
      height:50px;
      float: left;
      padding-left: 180px;
   }
	#article /*반투명 박스*/
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
	#photobox
	{
		width:600px;
		height: 300px;
		font-size: 16px;
		text-align: left;
		padding: 30px;
		background: url(<?php echo $photoSource ?>) center no-repeat;
		background-size: cover;
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
	#in_box2 /*작성자 내용*/
	{
		width:100px;
		height: 30px;
		font-family: "a옛날사진관4";
		font-size: 17px;
		text-align: left;
		color: #555555;
		padding: 2px 0px 4px 5px;
		border-bottom: 2px solid #555555;
		float:left;
	}
	#in_box3 /*작성자,등록일*/
	{
		width:70px;
		height:30px;
		font-family: "a옛날사진관5";
		font-size: 17px;
		text-align: left;
		color: #555555;
		padding: 2px 0px 4px 5px;
		border-bottom: 2px solid #555555;
		float:left;
	}
	#in_box4 /*등록일 내용*/
	{
		width:120px;
		height: 30px;
		font-family: "a옛날사진관4";
		font-size: 17px;
		text-align: left;
		color: #555555;
		padding: 2px 0px 4px 5px;
		border-bottom: 2px solid #555555;
		float:left;
	}
	#in_box5 /* 내용 */
	{
		width:745px;
		height: 500px;
		font-family: "a옛날사진관3";
		font-size: 16px;
		text-align: left;
		color: #555555;
		padding: 20px;
	}
	#in_box6 /* 가격 */
	{
		width:245px;
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
		width:90px;
		height:30px;
		font-family: "a옛날사진관4";
		font-size: 20px;
		text-align: left;
		color: #555555;
		padding: 2px 0px 4px 5px;
		
		float:left;
	}
	#in_box8 /* 공유/기부 */
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
	#in_box9 /*등록번호, 카테고리*/
	{
		width:90px;
		height:30px;
		font-family: "a옛날사진관5";
		font-size: 17px;
		text-align: left;
		color: #555555;
		padding: 10px 0px 2px 5px;
		
		float:left;
	}
	#in_box10 /*등록,cat 내용*/
	{
		width:120px;
		height: 30px;
		font-family: "a옛날사진관4";
		font-size: 17px;
		text-align: left;
		color: #555555;
		padding: 10px 0px 2px 5px;
		float:left;
	}
	#in_box11 /*마감날짜 내용*/
	{
		width:230px;
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
	#T_2/*하단 쉐어링 웹 박스*/
	{
		width: 870px;
		padding: 10px;
		font-family: "a옛날사진관4";
		font-size:13px;
		color:#555555;
		text-align: right;
	}
	#B1/*수정 버튼*/
   {
      width: 160px; height: 40px;
      padding: 5px 40px 5px 40px;
      border-radius: 15px 0 0 15px;
      border-right: none;
      color: #555555;
      font-size: 20px;
      border:3px solid #555555;
      font-family: "a포스터m";
      background: none;
      float: left;
   }
   #B1:hover
   {
      background:white;
   }
   #B2/*삭제 버튼*/
   {
      width: 160px; height: 40px;
      padding: 5px 40px 5px 40px;
      border-radius: 0px 0px 0px 0px;
      border-left,border-right: none;
      border-right: none;
      color: white;
      font-size: 20px;
      border:3px solid #555555;
      background: #555555;
      font-family: "a포스터m";
      float: left;
   }
   #B2:hover
   {
      background:white;
      color:#555555;
   }
   #B3/*글목록 버튼*/
   {
      width: 90px; height: 24px;
      padding: 5px 30px 5px 30px;
      border-radius: 0 15px 15px 0;
      color: #555555;
      font-size: 20px;
      border:3px solid #555555;
      background: none;
      font-family: "a포스터m";
      float: left;
   }
   #B3:hover
   {
      background:white;
      color:#555555;
   }
   #B4/* 구매버튼*/
   {
      width: 150px; height: 30px;
      padding: 1px 40px 2px 40px;
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
			<div id="article"><!-- 반투명 박스-->
				<div id="title_box1">
					게 시 글
				</div>
				<br><br><br>
				<div id=box3>
					<div id="in_box0">제품명 | </div>
					<div id="in_box1"><?php echo $proName ?></div>
					<div id="in_box3">작성자 | </div>
					<div id="in_box2"><?php echo $userID ?></div>
					<div id="in_box3">등록일 | </div>
					<div id="in_box4"><?php echo $rDate ?></div><br>
					<div id="in_box9">등록번호 |</div>
					<div id="in_box10"><?php echo $proID ?></div>
					<div id="in_box9">카테고리 |</div>
					<div id="in_box10"><?php echo $cat ?></div>
					<div id="in_box9">마감날짜 |</div>
					<div id="in_box11"><?php echo $deadDate ?> &nbsp; &nbsp;<?php echo $deadTime ?></div>
					<br><br>
					<div id="in_box5"><?php echo $content ?><br><br>
						<?php 
						if($num_record!=0) { ?>
						<div id=photobox></div> <?php } ?>
					</div>
					<div id="in_box8"><?php echo $share ?></div>
					<div id="in_box12"><form method="post" action="dealComplete.php"><input type="hidden" id="B5" readonly name="articlenum" value= <?php echo $proID; ?> ><input type="submit" id="B4" value="거 래"></form></div>

					<?php if($price!=null) {
                  	?>
					<div id="in_box6">가격 | ₩</div>
					<div id="in_box7"><?php echo $price ?></div> <?php } ?>
				</div>
				<br>
				<dir id=box4>
            <form method="post" action="writeModify.php">
               <input type="hidden" id="B5" readonly name="articlenum" value= <?php echo $proID; ?> >
               <input type="submit" id="B1" value="수  정"></form>
            <form method="post" action="delete.php">
                <input type="hidden" id="B5" readonly name="articlenum" value= <?php echo $proID; ?> >
            	<input type="submit" id="B2" value="삭  제"></form><a href="list.php"><botton type="button" id="B3">글 목 록</botton></a></dir>

			</div>
			<p id="T_2">@Konkuk University Sharing Web</p>
		</div>
	</div>
</body>

</HTML>