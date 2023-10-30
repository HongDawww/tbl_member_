<?php
	// 변수 -  페이징 또는 검색 시 같이 넘겨야하는 변수들  

	try {
		// 연결
		$pdo = new PDO("mysql:host=localhost;dbname=tbl_member","root","php504");

		//에러 출력
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		// 쿼리문 작성
		$strSQL = 
		" SELECT "
		." 		* "
		."		FROM "
		."			tbl_member "
		."		ORDER BY "
		."				idx DESC "
		."		LIMIT 0,5 "
		;
		$stmt = $pdo->prepare($strSQL);
		
		// 실행
		$res = $stmt->execute();

		//조회 : 쿼리문에 대한 성공 여부 (결과 조회)
		// echo $result;

		// --------Fetch Mode를 통해서 상수를 지정하여 결과를 가져옴
		// --------fetch_assoc = 연관배열 반환  db의 열 이름 (필드명)

		// fetch mode 지정
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		// $row = $stmt->fetch();
		// echo "<pre>";
		// print_r($row);
		// echo "</pre>";

		// echo $row["user_id"]; 


?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>list</title>
</head>
<body>
	<h2>list</h2>
	<!-- member list -->
	<table>
		<tr>
			<th>#</th>
			<th>user_id</th>
			<th>user_name</th>
			<th>user_email</th>
			<th>user_password</th>
			<th>user_register</th>
			<th>update</th>
			<th>delete</th>
		</tr>
		<?php
		//	fetch() 
		//	$row["idx"]
			while($row = $stmt->fetch()) {
		?>
		<tr>
			<td><?php echo $row["idx"] ?></td>
			<td><?php echo $row["user_id"] ?></td>
			<td><?php echo $row["user_name"] ?></td>
			<td><?php echo $row["user_email"] ?></td>
			<td><?php echo $row["user_password"] ?></td>
			<td><?php echo $row["user_register"] ?></td>
			<td><a href="member_update_form.php?idx=<?php echo $row["idx"] ?>">update</a></td>
			<td><a href="member_delete_form.php?idx=<?php echo $row["idx"] ?>">delete</a></td>
		</tr>
		<?php
			}
		?>
	</table>
	<p><a href="member_insert_form.php">Join MemberShip</a></p>
</body>
</html>

<?php
	}
	catch ( PDOException $e) {
		echo "Error".$e->getMessage();
		exit;
	}
	catch ( Exception $e) {
		echo "Error general :".$e->getMessage();
		exit;
	 }
	
	// 종료
	// 성공메세지 또는 이동 (없으면 생략)
?>