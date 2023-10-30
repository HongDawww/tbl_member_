<?php
	//넘어온 값 체크
	$user_id = $_POST["user_id"];
	$user_name = $_POST["user_name"];
	$user_email = $_POST["user_email"];
	$user_password = $_POST["user_password"];
	$user_register = $_POST["user_register"];

	// try - catch 사용
	try{
		// DB 연결
		$pdo = new PDO('mysql:host=localhost; port=3306; dbname=tbl_member','root','php504');

		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			// 쿼리 작성
			$strSQL  = 
			" INSERT INTO "
			." 		tbl_member ( "
			." 			user_id "
			." 			,user_name "
			." 			,user_email "
			." 			,user_password "
			." 			,user_register "
			."		 ) "
			." 		VALUES ( "
			."			? "
			."			,? "
			."			,? "
			."			,? "
			."			,now() "
			." 		) "
			;
			
			$stmt = $pdo->prepare($strSQL);
			$stmt->bindValue(1,$user_id);
			$stmt->bindValue(2,$user_name);
			$stmt->bindValue(3,$user_email);
			$stmt->bindValue(4,$user_password);

			// 실행
			$stmt->execute();
			// 종료
			

	} 
		catch (PDOException $e) {
			echo 
				"
					<script>
						window.alert('다시 Form 페이지로 이동');
						location.href='member_insert_form.php';
					</script> 

				";

			exit;
	} 
		catch (Exception $e) {
			echo "General Error :".$e->getMessage();
			exit;
	} finally {
		$pdo = null;
	}
	
	// 성공
	echo 
		"	
			<script>
				window.alert('추가 성공')
				location.href='member_list_db.php'
			</script> 	

		";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>Document</title>
</head>
<body>
	
</body>
</html>