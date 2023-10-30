<?php
	$idx = $_GET["idx"];

	try{
		$pdo =  new PDO("mysql:host=localhost;dbname=tbl_member","root","php504");

		$strSQL = 
		" SELECT "
		." 		* "
		." 		FROM "
		."		tbl_member "
		."	 WHERE "
		." 		idx  = {$idx} "
		;

		$stmt = $pdo->prepare($strSQL);

		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
	

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="insert.css">
	<link rel="stylesheet" href="style.css">
	<title>Update</title>
</head>
<body>	
	<h1>
		<span>U</span>
		<span>P</span>
		<span>D</span>
		<span>A</span>
		<span>T</span>
		<span>E</span>
	</h1>
		<form action="member_update_db.php" method="POST" id="memberinsertForm">
			<input type="hidden" name="idx" value="<?php echo $idx ?>">
			<ul>
				<li><input type="text" name="user_id" placeholder="user_id" value="<?php echo $row["user_id"] ?>"></li>
				<li><input type="text" name="user_name" placeholder="user_name" value="<?php echo $row["user_name"] ?>"></li>
				<li><input type="text" name="user_email" placeholder="user_email" value="<?php echo $row["user_email"] ?>"></li>
				<li><input type="password" name="user_password" placeholder="user_password" value="<?php echo $row["user_password"] ?>"></li>
			</ul>

		</form>
			<!-- <hr style="height:0.5px; border-width:0; background-color:skyblue;"> -->
			<div id ="form-button">
				<button onClick="document.getElementById('memberinsertForm').submit();">Update</button>
				<button type="button" onClick ="javascript:history.back();">Back(←)</button>
				<button type="button" onClick ="javascript:location.href='member_list_db.php';">Member List</button>
			</div>
</body>
</html>

<?php
	}
	catch ( PDOException $e ) {
		echo "Error".$e->getMessage();
		exit;
	}
	catch ( Exception $e ) {
		echo "Error general :".$e->getMessage();
		exit;
	}
?>