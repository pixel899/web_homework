<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<meta http-equiv="Content-Type" content="text/html">
		<link rel="stylesheet" href="style.css" type="text/css">
		<title>Врачи</title>
	</head>
	<body>
		<img id="pic" src="images/iconfinder_medic.png" width="50" height="50" alt="lorem">
		<h1 id="header">Справочно-учетная система СТАЦИОНАР</h1>

		<main>
			<nav>
				<ul id="menu">
					<li><a href="index">Журнал</a></li>

				    <li><a href="newpatient">Новый пациент</a></li>

				    <li><a href="diagnos">Новый Осмотр</a></li>

				    <li><a href="patient">Найти пациента</a></li>

				    <li><a href="doctor">Врачи</a></li>
				</ul>
			</nav>
			<table class="table">
					<thead>
						<tr>
							<th>Табельный номер</th>
							<th>Имя</th>
							<th>Фамилия</th>
							<th>Должность</th>
						</tr>
					</thead>
				<tbody>
					<?php 
					require 'connect.php';
					$sql = "SELECT * FROM doctor ";
					$result = mysqli_query($connection, $sql);
					$row = mysqli_fetch_assoc($result); 
					do
					{						 				 
						?>
							<tr>
								<td><?php echo $row['NPERSONNEL']; ?></td>
								<td><?php echo $row['name']; ?></td>
								<td><?php echo $row["surname"]; ?></td>
								<td><?php echo $row["position"]; ?></td>	
							</tr>
						<?php  
					}while ($row = mysqli_fetch_assoc($result));  
					?>  	
				</tbody>
			</table>
		</main>
	</body>
</html>