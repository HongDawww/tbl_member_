<?php

$idx = $_GET["idx"];

try {
	$pdo = new PDO("mysql:host=localhost;dbname=tbl_member","root","php504");

	$strSQL = 
	" SELECT "
	."		* "
	." 		FROM "
	." 			tbl_member "
	." 		WHERE "
	." 			idx = {$idx} ";

	$stmt = $pdo->prepare($strSQL);

	$stmt->execute();

	$row = $stmt->fetch(PDO::FETCH_ASSOC);

} 
catch ( PDOException $e) {
	echo $e->getMessage();
	exit;
} 
catch (Exception $e ) {
	echo $e->getMessage();
	exit;
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="insert.css">
	<link rel="stylesheet" href="style.css">
	<title>Delete</title>
	<style>
		
		li > input {
			background-color: rgb(172, 172, 172);
		
		}

		ul > li:last-child > input{
			background-color: rgb(230, 230, 230);
		}
	</style>
</head>

<body>
	<h1>
		<span>D</span>
		<span>E</span>
		<span>L</span>
		<span>E</span>
		<span>T</span>
		<span>E</span>
	</h1>


		<form action="member_delete_db.php" method="post" id="memberDeleteForm">
			<input type="hidden" name="idx" value="<?php echo $idx ?>"> 
			<ul>
				<li><input type="text" name="user_id" placeholder="user_id" readonly value="<?php echo $row["user_id"] ?>"></li>
				<li><input type="text" name="user_name" placeholder="user_name" readonly value="<?php echo $row["user_name"] ?>"></li>
				<li><input type="text" name="user_email" placeholder="user_email" readonly value="<?php echo $row["user_email"] ?>"></li>
				<li><input type="text" name="user_password" placeholder="user_password" readonly value="<?php echo $row["user_password"] ?>"></li>
				<li><input type="text" name="user_register" placeholder="user_register" readonly value="<?php echo $row["user_register"] ?>"></li>
				<li><input type="password" name="validpw" placeholder="비밀번호입력"></li>
			</ul>
		</form>
		<div id ="form-button">
			<button id="btnid" onClick="document.getElementById('memberDeleteForm').submit();">Delete</button>
			<button type="button" onClick="javascript:history.back();">Back(←)</button>
			<button type="button" onClick="javasctipt:location.href='member_list_db.php';">Member List</button>
		</div>
</body>
</html>