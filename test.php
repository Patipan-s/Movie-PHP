<?php

// ตั้งตัวแปลติอต่อไปยังฐานข้อมูล
$db_host = 'localhost'; // ชื่อเซฟเวอร์
$db_user = 'root'; // ชื่อผู้ใช้
$db_pass = ''; // พาสเวิด
$db_name = 'moviedb'; // ชื่อฐานข้อมูล
$connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);


// เช็คการเข้าถึงฐานข้อมูล
if (!$connect) {
	die ('ไม่สามารถเชื่อมต่อ MySQL: ' . mysqli_connect_error());
}

// เรียกข้อมูลจากฐานข้อมูล
$sql = 'SELECT * FROM movietable';
$query = mysqli_query($connect, $sql);


?>
	<!-- ส่วนของหน้าเว็บ -->
	<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="th" lang="th">

	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
		<title>Displaying MySQL Data in HTML Table</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="font/stylesheet.css">
		<link rel="stylesheet" href="style.css">
	</head>

	<body>
		<!-- ตัวเมนูบาร์ -->
		<nav class="nav nav-pills nav-fill">
			<a class="nav-item nav-link active" href="table_movie.php">โปรแกรมหนัง</a>
			<a class="nav-item nav-link" href="insert_movie.php">เพิ่มหนัง</a>
			<a class="nav-item nav-link" href="updated_movie.php">แก้ไขข้อมูลหนัง</a>

		</nav>

		<div class="container">
			<h1 class="text-center">โปรแกรมหนังใหม่</h1>
		</div>
		<div class="container ">
			<div class="row ">

				<!-- กล่องค้นหาตามเดือนที่ฉาย -->
				<div class="col-sm-4">
					<form action="search_month.php" method="post">
						<div class="form-group ">
							<label for="month">ค้นหาตามเดือนที่เข้าฉาย</label>
							<div class="row">
								<div class="col-sm-9">
									<select class="form-control" name="month">
										<option value=""></option>
										<option value="มกราคม">มกราคม</option>
										<option value="กุมภาพันธ์">กุมภาพันธ์</option>
										<option value="มีนาคม">มีนาคม</option>
										<option value="เมษายน">เมษายน</option>
										<option value="พฤษภาคม">พฤษภาคม</option>
										<option value="มิถุนายน">มิถุนายน</option>
										<option value="กรกฎาคม">กรกฎาคม</option>
										<option value="สิงหาคม">สิงหาคม</option>
										<option value="กันยายน">กันยายน</option>
										<option value="ตุลาคม">ตุลาคม</option>
										<option value="พฤศจิกายน">พฤศจิกายน</option>
										<option value="ธันวาคม">ธันวาคม</option>
									</select>
								</div>
								<div class="col-sm-3">
									<button class="btn btn-warning">ค้นหา</button>
								</div>
							</div>
						</div>
					</form>
				</div>

				<!-- กล่องค้นหาตามชื่อที่ฉาย -->
				<div class="col-sm-4">
					<form action="search_name.php" method="post">
						<div class="form-group ">
							<label for="name">ค้นหาตามชื่อหนัง</label>
							<div class="row">
								<div class="col-sm-9">
									<input type="text" name="name" class="form-control" pattern="[^':]*$" title="ไม่อนุญาติให้ใส่สัญลักษณ์ ( ' ) single quote "
									 required>
								</div>
								<div class="col-sm-3">
									<button class="btn btn-warning">ค้นหา</button>
								</div>
							</div>
						</div>
					</form>
				</div>




			</div>
		</div>
		</div>


		<!-- ตารางรายการหนัง -->
		<div class="container">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">ID</th>
						<th scope="col"></th>
						<th scope="col">ชื่อเรื่อง</th>
						<th scope="col">วันที่เข้าฉาย</th>
						<th scope="col" style="text-align:center">เรื่องย่อ</th>

					</tr>
				</thead>
				<tbody>
					<?php
		// ฟังก์ชันเรียกข้อมูลแต่ละแถวจนแถวสุดท้าย
		while ($row = mysqli_fetch_assoc($query))
		{
			// $row['...'] ใช้เรียกข้อมูลของแต่ละฟีวของฐานข้อมูล
			echo '<tr>
					<td style="vertical-align:middle">'.$row['id'].'</td>
					<td style="vertical-align:middle"><img src="img/'.$row['img'].'" height="180px" width="130px"></td>
					<td style="width: 25%; vertical-align:middle">'.$row['name'].'</td>
					<td style="width: 20%; vertical-align:middle">'.$row['day']." ".$row['month']." ".$row['year'].'</td>
					<td style="vertical-align:middle">'.$row['describe'].'</td>

				</tr>';

		}?>
				</tbody>

			</table>
		</div>



	</body>

	</html>