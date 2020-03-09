<?php
   session_start();

   if(!isset($_SESSION['userID'])) {
      echo ("<script>window.alert('로그인 후 이용해 주세요.'); history.back(); </script>");
   }

   $con=mysqli_connect("localhost", "root", "password", "kusDB") or die("MYSQL 접속 실패!!");
   $sql="select * from product";
   $ret=mysqli_query($con, $sql);
   $num_record=mysqli_num_rows($ret);

   $count= 233*$num_record;
   $count1= $count+200;
   $count2= $count1+100;
   $count3= $count2+300;

?>

<!DOCTYPE html>

<HTML>

<HEAD>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<title> KU Sharing :: 게시판 </title>
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
      height:<?php echo $count3; ?>px;
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
      height:<?php echo $count2; ?>px;
      text-align: center;
      color:white;
      padding-left: 62px;
      font-size: 30px;
      font-family: "a포스터m";
   }
   #box3/*게시글 박스*/
   {
      width:790px;
      height:150px;
      background: rgba(85,85,85,0.2);
      border-radius: 25px;
      text-align: center;
      padding:25px;
   }
   #box4/*게시글 3개 묶음*/
   {
      width:839px;
      height:<?php echo $count; ?>px;
      text-align: center;
      padding:0px;
      border:1px black;
   }
   #login_box/*반투명 박스*/
   {
      width:840px;
      height:<?php echo $count1; ?>px;
      background: rgba(255,255,255,0.4);
      border-radius: 25px;
      text-align: center;
      padding:30px;
   }
   #title_box1
   {
      width:570px;
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
      width:300px;
      height: 30px;
      font-family: "a옛날사진관4";
      font-size: 20px;
      text-align: left;
      color: #555555;
      padding: 2px 0px 4px 10px;
      border-bottom: 2px solid #555555;
      float:left;
   }
   #in_box2
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
   #in_box3
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
   #in_box4
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
   #in_box5
   {
      width:745px;
      height: 50px;
      font-family: "a옛날사진관3";
      font-size: 16px;
      text-align: left;
      color: #555555;
      padding: 20px;
      /*border: 1px solid #555555;*/
   }
   #in_box6/* 가격 \*/
   {
      width:240px;
      height:30px;
      font-family: "a옛날사진관5";
      font-size: 20px;
      text-align: right;
      color: #555555;
      padding: 2px 0px 4px 5px;
      /*border: 1px solid #555555;*/
      float:left;
   }
   #in_box7
   {
      width:90px;
      height:30px;
      font-family: "a옛날사진관4";
      font-size: 20px;
      text-align: left;
      color: #555555;
      padding: 2px 0px 4px 5px;
      /*border: 1px solid #555555;*/
      float:left;
   }
   #in_box8/* 공유 */
   {
      width:330px;
      height:30px;
      font-family: "a옛날사진관5";
      font-size: 20px;
      text-align: left;
      color: #555555;
      padding: 2px 0px 4px 5px;
      /*border: 1px solid #555555;*/
      float:left;
   }
   #in_box9/* 거래완료 */
   {
      width:100px;
      height:30px;
      font-family: "a옛날사진관5";
      font-size: 20px;
      text-align: center;
      color: #2ca9b4;
      padding: 2px 0px 4px 5px;
      float:left;
   }
   #in_box10/*검색박스*/
   {
      width: 630px;
      height: 42px;
      padding:0;
      float: left;
   }
   #in_box11/*글작성 버튼박스*/
   {
      width: 200px;
      height: 42px;
      padding:0;
      float: left;
   }
   #T_1
   {
      font-family: "a옛날사진관5";
      font-size:18px;
      color:#555555;
      
   }
   #T_2
   {
      width: 870px;
      padding: 10px;
      font-family: "a옛날사진관4";
      font-size:13px;
      color:#555555;
      text-align: right;
   }
   #B2
   {
      width: 200px; 
      height: 70px;
      padding: 5px 45px 5px 45px;
      /*background:radial-gradient(#9ad4fc,#dcffb8);*/
      border-radius: 40px;
      border-left: none;
      color: white;
      font-size: 20px;
      border:5px solid #555555;
      background: #555555;
      font-family: "a포스터m";
   }
   #B2:hover
   {
      background:white;
      color:#555555;
   }
   #B3/*선택 창*/
   {
      width:110px;
      height:42px;
      font-size: 15px;
      color:#555555;
      border: 3.5px solid #2ca9b4;
      background: #white;
      font-family: "a옛날사진관3";
      padding-left:10px;
      padding-top: 4px;
      border-radius: 30px 0px 0px 30px;
      border-right: none;
   }
   #B4
   {
      margin:0;
      padding: 2px 10px 2px 10px;
      height: 35px;
      border: none;
      border-left: none;
      border-radius: 10px;
      font-family: "a옛날사진관4";
      font-size: 18px;
      font-weight: bold;
      background: #2ca9b4;
      color:#555555;
   }
   #B5
   {
      margin:0;
      padding: 2px 10px 2px 10px;
      height: 30px;
      width: 100px;
      border: none;
      border-left: none;
      border-radius: 10px;
      font-family: "a옛날사진관4";
      font-size: 14px;
      font-weight: bold;
      background: none;
      color:#555555;
      /*opacity: 0.0;*/
   }
   input[type="text"]
   {
      padding: 10px 30px 10px 30px;
      width:350px;
      height: 15px;
      border: 3.5px solid #2ca9b4;
      font-family: "a옛날사진관3";
      font-size: 20px;
      text-align: center;
      border-right:none;
      border-left: none;
      /*background: none;*/
   }
   input[type="submit"]
   {
      margin:0;
      padding: 3px 15px 0px 20px;
      height: 42px;
      border: none;
      border-left: none;
      border-radius: 0 30px 30px 0;
      font-family: "a옛날사진관4";
      font-size: 16px;
      font-weight: bold;
      background: #2ca9b4;
      color:#555555;
   }
   input[type="submit"]:hover
   {
      color:white;
   }

   table
   {
      /*border: 1px solid #555555;*/
      width:740px;
      padding-left: 80px;
   }
   td
   {
      text-align: left;
      padding: 8px 30px 8px 40px;
      /*border: 1px solid #555555;*/
      color:#555555;
      font-family: "a옛날사진관4";
      font-size: 25px;
      text-decoration: bold;
   }
   a:link
   {
      text-decoration: none;
      color:white;
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
         <div id="login_box">
            <div id="title_box1">
               게 시 판
            </div>
            &nbsp;&nbsp;&nbsp;<a href="myPage.php"><img src="mypage.png" height=60></a>&nbsp;<a href="logout.php"><img src="home.png" height=70></a>
            <br><br>
            <div id="in_box10"><form method="post" action="search.php"><select id="B3" name=option required>
                     <option value="제품명">제품명</option>
                     <option value="제품범주">제품범주</option>                                          
                     <option value="내용">내용</option>
                     <option value="공유/기부">공유/기부</option>

                  </select><input type="text" name=search placeholder="Search" required><input type="submit" value=" 검 색   "></form></div><div id="in_box11"><a href="writePage.php"><botton type="button" id="B2">글 작 성</botton></a></div><br><br>
                  <!--<div id=box4>-->
            
            <?php 
            $con=mysqli_connect("localhost", "root", "password", "kusDB") or die("MYSQL 접속 실패!!");
            $sql="select * from product order by proID desc";
            $ret=mysqli_query($con, $sql);
            $num_record=mysqli_num_rows($ret);
            $count=$num_record;
            

            while($row=mysqli_fetch_array($ret)) 
            { 
            $receiver=$row['receiver'];
            $borrower=$row['borrower'];
               ?>
            <div id=box3>
                  <div id="in_box0">제품명 | </div>
                  <div id="in_box1"><?php echo $row['proName']?></div>
                  <div id="in_box3">작성자 | </div>
                  <div id="in_box2"><?php echo $row['lender']?></div>
                  <div id="in_box3">등록일 | </div>
                  <div id="in_box4"><?php echo $row['rDate']?></div><br>
                  <div id="in_box5"><?php echo $row['content']?></div>

                  <div id="in_box8"><?php if(($row['price'])==null)
                     echo "[기부]"; else echo "[공유]"; ?>
                     
                  </div>
                  <div id="in_box9">
                     <?php if($receiver!=null or $borrower!=null) { ?>거래완료<?php } else { ?>
                     <form method="post" action="article.php">      
                        <input type="submit" id="B4" value="거래하기" ><input type="hidden" id="B5" readonly name="virtual" value=<?php echo $count ?> >
                     </form><?php } ?>
                  </div>

                  <?php if(($row['price'])!=null) {
                  ?>
                  <div id="in_box6">가격 | ₩</div>
                  <div id="in_box7"><?php echo $row['price']?></div> <?php } ?>
            </div><br><?php $count--; } ?>
                 
            <br><br>
            
         </div>
         <p id="T_2">@Konkuk University Sharing Web</p>
      </div>
   </div>
</body>

</HTML>