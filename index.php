<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<meta http-equiv="Content-Type" content="text/html">
		<link rel="stylesheet" href="style.css"  type="text/css">
		<title>Стационар</title>
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


			<article class="content">
				<form method='post' action=''>
				<p><b> Дата :</b></p><input class="field" type="date" name="date1">&nbsp&nbsp<input class="field" type="date" name="date2"></p>
			    </p><input class="field" placeholder="Номер амбулаторной карты" type="number" name="NCARD" size="30" style="width: 200px"></p>
			    <input class="field" placeholder="Табельный номер врача" type="number" name="NPERSONNEL" size="30" style="width: 200px"></p>
			    <input class="field" placeholder="Номер палаты" type="number" name="room" size="30" style="width: 120px"></p>
			    <p><button class="submit" type="submit" name="submit" style="width: 100px">Искать</button></p>
				</form>
			</article>

			<table class="table" style="width: 1200px">
					<thead>
						<tr>
							<th style="width: 100px">Дата</th>
							<th>№ амбулаторной карты</th>
							<th>Табельный номер врача</th>
							<th>Назначения</th>
							<th>Процедуры</th>
							<th>№ Палаты</th>
							<th>Коментарий</th>
						</tr>
					</thead>
				<tbody>
					<?php
					require 'connect.php';

					$date1 = trim($_POST['date1']);
					$date2 = trim($_POST['date2']);

					if(isset($_POST['NCARD']))
					{
						$NCARD = trim($_POST['NCARD']);
					}
					if(isset($_POST['NPERSONNEL']))
					{
						$NPERSONNEL = trim($_POST['NPERSONNEL']);
					}
					if(isset($_POST['room']))
					{
						$room = trim($_POST['room']);
					}

					if(isset($_POST['submit']))
					{

						$result = $con->prepare("SELECT * FROM document WHERE (`date` BETWEEN '$date1' AND '$date2')  AND `ID_NCARD` LIKE ? OR `ID_NPERSONNEL` LIKE ? OR `room` LIKE ? ORDER BY `date` ");
						$result->execute(array($NCARD,$NPERSONNEL,$room));
						$count = $result->fetch(PDO::FETCH_ASSOC);
						$row = $result->fetch();

						if ($count > 0)
						{
							do
							{	 
								?>
									<tr>
										<td><?php echo $row['date']; ?></td>
										<td><?php echo $row['ID_NCARD']; ?></td>
										<td><?php echo $row['ID_NPERSONNEL']; ?></td>
										<td><?php echo $row['prescription']; ?></td>
										<td><?php echo $row['procedures']; ?></td>
										<td><?php echo $row['room']; ?></td>	
										<td><?php echo $row['comment']; ?></td>
									</tr>
								<?php  
							}while ($row = $result->fetch()); 
						}
						else
						{
						  echo ("<p>&nbsp&nbsp&nbspПо вашему запросу ничего не найдено</p>");
						}
					}
					?>  	
				</tbody>
			</table>
		</main>
	</body>
</html>