<?php

	// 변수 
	$idx = $_POST["idx"];
	$user_id = $_POST["user_id"];
	$user_name = $_POST["user_name"];
	$user_email = $_POST["user_email"];
	$user_password = $_POST["user_password"];

	try {

		$pdo = new PDO("mysql:host=localhost;dbname=tbl_member","root","php504");

		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$strSQL = 
		" UPDATE "
		." 		tbl_member "
		."		SET "
		." 			user_id = ? "
		."			,user_name = ? "
		."			,user_email = ? "
		."			,user_password = ? "
		."		WHERE "
		."			idx = ? "
		;

		$stmt = $pdo->prepare($strSQL);
		
		$stmt->bindValue(1,$user_id);
		$stmt->bindValue(2,$user_name);
		$stmt->bindValue(3,$user_email);
		$stmt->bindValue(4,$user_password);
		$stmt->bindValue(5,$idx);

		$stmt->execute();


		echo 
		"	<script>
				window.alert($idx+'번 수정완료');
				location.href = 'member_list_db.php?idx='+$idx;
			</script>	
		";

	}
	catch ( PDOException $e ) {
		echo "DB Error".$e->getMessage();
	}
	catch ( Exception $e ) {
		echo "General Error".$e->getMessage();
	}

