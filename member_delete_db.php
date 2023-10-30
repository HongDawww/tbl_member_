<?php
	$idx = $_POST["idx"];
	$user_password = $_POST["user_password"];
	$validpw = $_POST["validpw"];

	// echo $idx;
	// echo $user_password;
	// echo $validpw;
	// echo 'gettype($user_password) :'.gettype($user_password).'<br>';
	// echo 'gettype($validpw) :'.gettype($validpw).'<br>';
	// echo 'gettype($user_password) :'.gettype((int)$user_password).'<br>';
	// echo 'gettype($validpw) :'.gettype((int)$validpw).'<br>';
	// exit;

	// 숫자인지 체크 
	// is_numeric(data), is_int(정수) --> true(1) of false

	// 변수가 문자열 또는 숫자형태의 문자열이라면 (예:1234) is_numeric() 함수는 1을 반환
	// if(is_numeric($validpw)){
	// 	echo '입력하신 비번이 숫자입니다';
	// }
	// else {
	// 	echo '입력하신 비번이 문자입니다';
	// 	exit;
	// }
	//echo is_numeric($validpw); - 1을 반환
	try {
		$pdo = new PDO("mysql:host=localhost;dbname=tbl_member","root","php504");

		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$strSQL = 
		" DELETE FROM tbl_member "
		." WHERE "
		." idx =  ? "
		;

		$stmt = $pdo->prepare($strSQL);
		$stmt->bindValue(1,$idx);

		//비밀번호 유효성 체크
		if($user_password == $validpw) {
			echo "O";
			$stmt->execute();
		}
		else {
			echo "X"."<br>";
			throw new Exception("비밀번호 불일치");
		}

		$pdo = null;
		
		echo 
		"
			<script>
				window.alert($idx+'번글 삭제 완료');
				location.href='member_list_db.php';
			</script>

		";


	}
	catch (PDOException $e) {
		echo "Error With database".$e->getMessage();
	}
	catch (Exception $e) {
		echo "Error general :".$e->getMessage();
	}



?>