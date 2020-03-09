<?php
   session_start();

  $articlenum=$_POST["articlenum"];

  $con=mysqli_connect("localhost", "root", "password", "kusDB") or die("MYSQL 접속 실패!!");


  $sql="select * from photo where photoNum='".$articlenum."'";
    $ret=mysqli_query($con, $sql);
    $num_record=mysqli_num_rows($ret);


    if($num_record!=0)
    {
    $row=mysqli_fetch_array($ret);      
    $photoSource=$row['photoSource'];

    $sql="delete from photo where photoSource='".$photoSource."' ";
    mysqli_query($con, $sql);
    }



  $sql="select * from product where proID='".$articlenum."'";

  $ret=mysqli_query($con, $sql);
  $row=mysqli_fetch_array($ret);
  $lender=$row['lender'];

  if($_SESSION['userID']!=$lender)
    echo ("<script>alert('수정권한이 없습니다.'); location.href='list.php';</script>");


  $sql="delete from product where proID='".$articlenum."' ";
    mysqli_query($con, $sql);




	echo "<script>alert('글 삭제가 완료되었습니다.'); location.href='list.php';</script>";
    mysqli_close($con);

?>