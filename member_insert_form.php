
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link rel="stylesheet" href="style.css"> -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Black+Han+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="insert.css">
	<title>Insert</title>
</head>
<body>
	<h1>
		<span>I</span>
		<span>N</span>
		<span>S</span>
		<span>E</span>
		<span>R</span>
		<span>T</span>
	</h1>
	<!-- <hr> -->

	<form action="member_insert_db.php" method="POST" id="memberinsertForm">
		<ul>
			<li><input type="text" name="user_id" placeholder="아이디를 입력하세요"></li>
			<li><input type="text" name="user_name" placeholder="이름을 입력하세요"></li>
			<li><input type="text" name="user_email" placeholder="이메일을 입력하세요"></li>
			<li><input type="password" name="user_password" placeholder="비밀번호를 입력하세요"></li>
			<li><input class="input_register" type="text" name="user_register" placeholder="등록일" 
				readonly 
				onClick= "window.alert('자동입력됩니다')" >
			</li>
			<small style="color: #999;">( 자동으로 입력 됩니다 )</small>
		</ul>

	</form>
	<div id ="form-button">
		<button onClick="document.getElementById('memberinsertForm').submit();">Submit</button>
		<button type="button" onClick ="javascript:history.back();">Back(←)</button>
		<button type="button" onClick ="javascript:location.href='member_list_db.php';">Member List</button>
	</div>
	</body>
</html>