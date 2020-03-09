<?php
   session_start();

   $con=mysqli_connect("localhost", "root", "password", "kusDB") or die("MYSQL 접속 실패!!");

   
   $proName=$_POST["proName"];
   $cat=$_POST["cat"];
   $content=$_POST["content"];
   $articlenum=$_POST["articlenum"];
   
   $sql="update product set proName='".$proName."' where proID='".$articlenum."' ";
    mysqli_query($con, $sql);
   $sql="update product set cat='".$cat."' where proID='".$articlenum."' ";
    mysqli_query($con, $sql);
   $sql="update product set content='".$content."' where proID='".$articlenum."' ";
    mysqli_query($con, $sql);   

   if ($_POST["price"])
   {
   	$price=$_POST["price"];
    $sql="update product set price='".$price."' where proID='".$articlenum."' ";
    mysqli_query($con, $sql);
   }

	echo "<script>alert('글 수정이 완료되었습니다.'); location.href='list.php';</script>";
    mysqli_close($con);

?>