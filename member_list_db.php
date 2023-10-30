<?php
	try {

		$pdo = new PDO( 'mysql: host=localhost; dbname=tbl_member', 'root', 'php504' );

		$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		
		$_GET['page'] = ( isset($_GET['page']) ) ? $_GET['page'] : 1;
		// echo "<br>";
		// var_dump( isset($_GET['page']) );
		// echo $_GET['page'];
		// exit;
		

		$listValue = 4;
		$pageValue = 10;
		
	
		$page = $_GET['page'];
		$c_position = ( $page - 1 ) * $listValue;
		
	
		// 쿼리문 작성 --> LIMIT 사용
		if ( empty($page) ) {
			// echo "O (true)";
			$strSQL = "SELECT * FROM tbl_member order by idx DESC";
		}
		else {
			// echo "X (false)";
			$strSQL = "SELECT * FROM tbl_member order by idx DESC LIMIT $c_position, $listValue";
		}
		$stmt = $pdo->prepare($strSQL);
		// exit;


		// 실행
		$res = $stmt->execute();
		// 조회(Select) 쿼리문에 대한 성공 여부(결과 조회)
		// echo $stmt->rowCount();  // 글 목록 갯수 --> 5
		// echo $res;
		
		// Fetch Mode
		$stmt->setFetchMode( PDO::FETCH_ASSOC );
		// $row = $stmt->fetch();
		// echo "<pre>";
		// print_r($row);
		// echo "</pre>";
		// echo $row[3]."<br>";  // 인덱스 넘버로는 안됨.
		// echo $row['user_email'];
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>List</title>
		<link rel="stylesheet" href="list.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
			
	</head>
	<body>
		
		<!-- Member List -->
		<h1 class="tracking-out-contract">
			php tbl member
		</h1>
		<!-- <h3>
			PHP<small class="text-muted"> 게시판 </small>
		</h3> -->

		
		
		<div class="container table-responsive" style="padding: 0">
			<table class="table table-striped table-hover text-center table-bordered tbl1">
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>user_id</th>
						<th>user_name</th>
						<th>user_email</th>
						<th>update / delete</th>
						<th>Write</th>
						<th>Memo</th>
					</tr>
				</thead>
				<tbody>
				<?php
					while( $row = $stmt->fetch() ) {
				?>
						<tr>
							<td><? echo $row["idx"] ?></td>
							<td><? echo $row["user_id"] ?></td>
							<td><? echo $row["user_name"] ?></td>
							<td class="text-left"><? echo $row["user_email"] ?></td>
							
							<td>
								<a class="ahref" href="member_update_form.php?idx=<? echo $row["idx"] ?>"><button class="btn btn-primary">수정</button></a>
								<a class="ahref" href="member_delete_form.php?idx=<? echo $row["idx"] ?>"><button class="btn btn-danger">삭제</button></a>
							</td>
							
							<td>
								<a class="btn btn-primary" href="member_insert_form.php">글쓰기</a>
							</td>
							<td>
								<a class="btn btn-primary" href="filememo_main.php">메모</a>
							</td>
						</tr>
							
				<?php
					}
				?>
				</tbody>
			</table>
		</div>
		
		<!-- 페이징 정보 -->
		<p>
		<?php
			// 1. 총 레코드 수
			// 2. 총 페이지 수 = 총 레코드 수 / 한 페이지에 보여지는 글의 갯수 
			// 3. 이전 페이지 / 다음 페이지 값
			
			// 총 레코드 수
			$strSQL = "";
			$strSQL = " SELECT COUNT(idx) AS total FROM tbl_member ";
			$stmt = $pdo->prepare($strSQL);
			$stmt->execute();
			$row = $stmt->fetch();
			// $totalRecords = $row[0];
			$totalRecords = $row['total'];
		
			
			// 총 페이지 수 
			$totalPages = ceil($totalRecords / $listValue);			
			// echo "Total Pages : <b>". $totalPages ."</b> pages";

			// 이전 페이지 / 다음 페이지 값
			$prev = $page - 1;
			$next = $page + 1;
		?>
		
		
			<nav class="container">
			<ul class="pagination">
				<!-- 이전(Prev) 버튼 -->
				<li class="page-item <?php echo $page == 1 ? 'disabled' : ''; ?>"><a href="?page=1" class="page-link">◀<small>처음</small></a></li>
				<li class="page-item <?php echo $page == 1 ? 'disabled' : ''; ?>"><a href="?page=<?php echo $prev; ?>" class="page-link">Previous</a></li>
				
				<!-- 페이징 버튼 -->
				<?php for ($i = 1; $i <= $totalPages; $i++): ?>
					<li class="page-item <?php echo $i == $page ? 'active' : ''; ?>"><a href="?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
				<?php endfor; ?>
				
				<!-- 다음(Next) 버튼 -->
				<li class="page-item <?php echo $page == $totalPages ? 'disabled' : ''; ?>"><a href="?page=<?php echo $next; ?>" class="page-link">Next</a></li>
				<li class="page-item <?php echo $page == $totalPages ? 'disabled' : ''; ?>"><a href="?page=<?php echo $totalPages; ?>" class="page-link"><small>맨끝</small>▶</a></li>
				
			</ul>

		</nav>
				
		</p>
		
	</body>
</html>

<?php
		// 5단계 : 종료
		$pdo = null;
	}
	catch ( PDOException $e ) {
		echo "Error with database : ".$e->getMessage();
		exit;
	}
	catch ( Exception $e ) {
		echo "Error general : ".$e->getMessage();
		exit;
	}
?>
