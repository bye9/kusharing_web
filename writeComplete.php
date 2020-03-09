<?php
   session_start();

   $con=mysqli_connect("localhost", "root", "password", "kusDB") or die("MYSQL 접속 실패!!");

   $proName=$_POST["proName"];
   $cat=$_POST["cat"];
   $content=$_POST["content"];
   $year=$_POST["year"];
   $month=$_POST["month"];
   $day=$_POST["day"];
   $am=$_POST["am"];
   $hour=$_POST["hour"];
   $minute=$_POST["minute"];
   $rDate=date("Y-m-d", time());
   $deadDate=$year."-".$month."-".$day;
   $deadTime=$am.":".$hour.":".$minute;


   if ($_POST["price"])
   {
   	$price=$_POST["price"];
   	$sql="insert into product values (null, '".$proName."','".$price."','".$cat;
   	$sql=$sql."','".$content."','".$_SESSION['userID']."','".$rDate."','".$deadDate."','".$deadTime."',null , null)";
   	mysqli_query($con, $sql);
   }
   else
   {
   $sql="insert into product values (null, '".$proName."',null,'".$cat;
   $sql=$sql."','".$content."','".$_SESSION['userID']."','".$rDate."','".$deadDate."','".$deadTime."',null , null)";
   mysqli_query($con, $sql);
   }

   $sql="select proID from product order by proID desc";
   $ret=mysqli_query($con, $sql);
   $row=mysqli_fetch_array($ret);
   $id=$row["proID"];

	$uploadfile=$_FILES['file']['name'];
   	if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
   		$source=$_FILES['file']['name'];
		$sql="insert into photo values ('".$source."', '".$id."')";
   		mysqli_query($con, $sql);
   	}
	echo "<script>alert('글 작성이 완료되었습니다.'); location.href='list.php';</script>";

    mysqli_close($con);

?>