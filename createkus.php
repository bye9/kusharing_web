<?php

	$con=mysqli_connect("localhost","root","password","") or die("MYSQL 접속 실패!!");

	$sql="create database kusDB";
	$ret=mysqli_query($con, $sql);

	if($ret) {
		echo "kusDB가 성공적으로 생성됨"."<br>";
	}
	else {
		echo "kusDB 생성 실패!!!"."<br>";
		echo "실패 원인 :".mysqli_error($con);
	}
	mysqli_close($con);


	$con=mysqli_connect("localhost","root","password","kusDB") or die("MYSQL 접속 실패!!");

	$sql = "
		create table user
		(	userID varchar(12) not null primary key,
			password varchar(200) not null,
			name varchar(4) not null,
			age int not null,
			gender char(6) not null,
			nickname varchar(5) not null,
			email char(30),
			phone char(13) not null
		)
		";

		$ret = mysqli_query($con, $sql);

		if($ret) {
			echo "kusDB의 테이블 user가 성공적으로 생성됨."."<br>";
		}
		else {
			echo "테이블 생성 실패!!"."<br>";
			echo "실패 원인:".mysqli_error($con);
		}

		$sql = "
		create table product
		(	proID int not null auto_increment primary key,
			proName varchar(10) not null,
			price varchar(7),
			cat varchar(7) not null,
			content varchar(100) not null,
			lender varchar(12) not null,
			foreign key (lender) references user (userID),
			rDate varchar(10) not null,
			deadDate varchar(10) not null,
			deadTime varchar(10) not null,
			borrower varchar(12),
			foreign key (borrower) references user (userID),
			receiver varchar(12),
			foreign key (receiver) references user (userID) 
		)
		";

		$ret = mysqli_query($con, $sql);

		if($ret) {
			echo "kusDB의 테이블 product가 성공적으로 생성됨."."<br>";
		}
		else {
			echo "테이블 생성 실패!!"."<br>";
			echo "실패 원인:".mysqli_error($con);
		}


		$sql = "
		create table photo
		(	photoSource varchar(20) not null primary key,
			photoNum int not null,
			foreign key (photoNum) references product (proID)
		)
		";

		$ret = mysqli_query($con, $sql);

		if($ret) {
			echo "kusDB의 테이블 photo가 성공적으로 생성됨."."<br>";
		}
		else {
			echo "테이블 생성 실패!!"."<br>";
			echo "실패 원인:".mysqli_error($con);
		}

		mysqli_close($con);
?>