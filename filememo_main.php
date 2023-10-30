
<?php
	$data_filedb = "data/filedb.txt";

	//파일 존재 확인 : 해당 폴더내에 파일이 존재하면 - 1
	$f_exist = file_exists($data_filedb);

	// if($f_exist) {
	// 	echo "파일이 존재합니다";
	// }
	// else {
	// 	echo "파일이 존재하지 않습니다";
	// }

	// exit;
	// 파일이 있으면 해당 파일을 열기 -> 행을 읽어들인 후 -> 배열로 저장


	// file() 함수는 파일 내용을 배열로 읽음
	// 성공 ->  true , 실패 -> false
	// if 조건문 등으로 참이면 file()
	// 거짓이면 빈 배열
	// 배열 요소에는 줄 바꿈 (newline) 계속해서 추가된 한 줄 포함
	// 출력은 loop foreach

	$filedb_rows = $f_exist ? file($data_filedb) : array();
	// echo gettype($filedb_rows);
	// echo "<pre>";
	
	// echo "</pre>";
	// exit;
	
	//Loop (foreach)
	// foreach($filedb_rows as $row_num=>$row) {
	// 	echo "Line Number #<span>{$row_num}</span>:".$row."<br/>";
	// }
	// exit;
	//-----------------------------------------------------------------------------

	//submit 버튼 클릭시 -> 파일에 쓰기
	if(isset($_POST["submit"])) 

	{
		//빈 값 체크
		if(empty($_POST["memo_id"]) || empty($_POST["memo_email"]) || empty($_POST["memo_password"])){
			echo "memo_id,memo_email,memo_password 값은 필수 입력입니다";
			echo "<p><button type='button' onClick='javascript:history.back();'>Back(←)</button></p>";
			// echo 
			// 	"
			// 		<script>
			// 			window.alert('memo_id,memo_email,memo_password / 3개 항복은 필수 입력입니다');
			// 			location.href = 'javascript:history.back();';
			// 		</script>	
			// 	";
			exit;
		}
		else {
			//addslashes 함수 사용
			// echo "memo_id : ".$_POST["memo_id"].'<br>';
			// echo "memo_email : ".$_POST["memo_email"].'<br>';
			// echo "memo_password : ".$_POST["memo_password"].'<br>';
			// echo "memo_content : ".$_POST['memo_content']."<br>";
			// echo "<hr>";
	

			$memo_id = addslashes($_POST["memo_id"]);
			$memo_email = addslashes($_POST["memo_email"]);
			$memo_password = addslashes($_POST["memo_password"]);
			$memo_content = addslashes($_POST["memo_content"]);

			// echo "memo_id : ".$memo_id."<br>";
			// echo "memo_email : ".$memo_email."<br>";
			// echo "memo_password : ".$memo_password."<br>";
			// echo "memo_content : ".$memo_content."<br>";
			// echo "<br>";
			// exit;

			// htmlspecialchars 함수 사용 : 출력에서 사용 고려 

			// $memo_id = htmlspecialchars(addslashes($_POST["memo_id"]));
			// $memo_email = htmlspecialchars(addslashes($_POST["memo_email"]));
			// $memo_password = htmlspecialchars(addslashes($_POST["memo_password"]));
			// $memo_content = htmlspecialchars(addslashes($_POST["memo_content"]));
			
			// echo "memo_id : ".$memo_id."<br>";
			// echo "memo_email : ".$memo_email."<br>";
			// echo "memo_password : ".$memo_password."<br>";
			// echo "memo_content : ".$memo_content."<br>";
			// echo "<br>";

			$first_line = explode(",",$filedb_rows[0]);
			// echo "<pre>";
			// print_r($first_line);
			// echo "</pre>";

			// echo "<pre>";
			// print_r($filedb_rows);
			// echo "<pre>";
			// exit;

			// 새 글 번호 형식에 맞춰서 구하기
			$new_number = $f_exist ? sprintf("%03d", $first_line[0]+1) : "001";

			//txt 파일에 입력 하는 조합
			$new_data = "$new_number, $memo_id, $memo_email, $memo_password, $memo_content\n";

			//배열의 맨 앞쪽에 새롭게 조합한 새 데이터($new_row) 추가 --> array_unshift 사용
			array_unshift($filedb_rows, $new_data);

			// 파일에 쓰기
			if (is_writable($data_filedb)) {
				//echo "This file is writable";
				$fp = fopen($data_filedb,'w');
				
				if($fp) {
					foreach ($filedb_rows as $row) {
						fputs ($fp, $row);
					}
					fclose($fp);
				}
				else {
					echo "파일 열기 실패";
				}
			}
			else {
				echo "This file is not writable";
				exit;
			} 
			
			header ("Location: filememo_main.php");
			
		}
	}
?>


<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="insert.css">
	<link rel="stylesheet" href="filememo_main.css">
	<title>FileMemo</title>
</head>
<body>
	<h1>
		<span>M</span>
		<span>E</span>
		<span>M</span>
		<span>O</span>
	</h1>

	<form action="" method="POST" id="memberInsertForm">
		<ul>
			<li><input type="text" name="memo_id" placeholder="아이디를 입력하세요" autocomplete="off" ></li>
			<li><input type="text" name="memo_email" placeholder="이메일을 입력하세요" autocomplete="off"></li>
			<li><input type="password" name="memo_password" placeholder="비밀번호를 입력하세요" autocomplete="off"></li>
			<li><textarea name="memo_content" id="memo_content" placeholder="메모를 입력하세요"cols="50" rows="50"></textarea></li>
		</ul>
		<div id ="form-button">
			<button type="submit" name="submit" onClick="document.getElementById('memberInsertForm').submit();">Submit</button>
			<button type="button" onClick="javascript:history.back();">Back(←)</button>
		</div>
	</form>
		<!-- list -->
		<!-- <div>
			<p>
				<b>NO :</b>#001 / 
				<b>ID :</b>mr.hong /
				<b>E.mail :</b> mr.hong@localhost.com /
				<b>Password : </b> 1234
			</p>
			<p>aaa</p>
		</div> -->

	<?php
		//---------------001---------------------
		// foreach ($filedb_rows as $row)
		// {
		// 	// echo $row;
		// 	$arr_data = explode(",",$row);

		// 	echo 
		// 	"<div>
		// 			<p>
		// 				<b>NO :</b>#{$arr_data[0]} / 
		// 				<b>ID :</b>{$arr_data[1]} /
		// 				<b>E.mail :</b> {$arr_data[2]} /
		// 				<b>Password : </b> {$arr_data[3]}
		// 			</p>
		// 			<p>
		// 				{$arr_data[4]}
		// 			</p>
		// 	</div>";
		// 	echo "<hr>";
		// }
		// ---------------002-----------------
		foreach ( $filedb_rows as $row ) 
			{
				$arr_data = explode( ",", $row );
				echo "<div class='memo'>";
				echo "	<ul>";
				echo "		<li><b>No</b> : #{$arr_data[0]}</li>";
				echo "		<li><b>ID</b> : {$arr_data[1]}</li>";
				echo "		<li><b>E.mail</b> : {$arr_data[2]}</li>";
				echo "		<li><b>Password</b> : {$arr_data[3]}</li>";
				echo "	</ul>";
				echo " <p class='p_line'>MEMO</P> ";
				echo "	<p>{$arr_data[4]}</p>";
				echo "</div>";
			
			}
	?>
<!-- 002 -->
	<!-- <div class="memo">
		<ul>
			<li>NO :adcac </li>
			<li>ID :SCASCSC</li>
			<li>E.mail :CASDcasascddddddd </li>
			<li>Password :cscaasc</li>
		</ul>
		<p>나는 이순신</p>
	</div>
	<hr> -->
</body>
</html>