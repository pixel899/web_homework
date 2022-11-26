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
					require 'config.php';
					require 'vendor/autoload.php';
					use models\database;
					use controllers\doctor;
					 
					$dt = new Database();
					
					$doctors = Doctors::show_doctor();
					
					foreach($doctors as $doctor) {
						?>
							<tr>
								<td><?php echo $doctor->NPERSONNEL; ?></td>
								<td><?php echo $doctor->name; ?></td>
								<td><?php echo $doctor->surname; ?></td>
								<td><?php echo $doctor->position; ?></td>	
							</tr>
						<?php  
					}
					?>  	
				</tbody>
			</table>

			<article class="content">
				<form method='post' action=''>
					<p><b>Табельный номер: </b><input class="field" type="number" name="NPERSONNEL" size="30" style="margin-left: 9px"></p>
					<p><b>Имя: </b><input class="field" type="text" name="name" size="30" style="margin-left: 51px"></p>
					<p><b>Фамилия: </b><input class="field" type="text" name="surname" size="30" style="margin-left: 18px"></p>
					<p><b>Должность: </b><input class="field" type="text" name="position" size="30" style="margin-left: 5px"></p>
									
					<button class="submit" type="submit" name="change">Изменить</button></br></br>
					<button class="submit" type="submit" name="delete">Удалить</button>
				</form>
			</article>
			<?php

				if(isset($_POST['NPERSONNEL']))
					{
						$NPERSONNEL = trim($_POST['NPERSONNEL']);
					}

				if(isset($_POST['name']))
					{
						$name = trim($_POST['name']);
					}
				if(isset($_POST['surname']))
					{
						$surname = trim($_POST['surname']);
					}
				if(isset($_POST['position']))
					{
						$position = trim($_POST['position']);
					}
				if(isset($_POST['change']))
					{
						try{

								if ((!preg_match("/^([а-яА-ЯЁёa-zA-Z]{1,30})$/u",$name)))
									throw new Exception	("<p><b>&nbsp&nbspВведите корректное имя</b></p>");
									
								if ((!preg_match("/^([а-яА-ЯЁёa-zA-Z]{1,30})$/u",$surname))) 
									throw new Exception ("<p><b>&nbsp&nbspВведите корректную фамилию</b></p>");
								if ((!preg_match("/^([а-яА-ЯЁёa-zA-Z]{1,30})$/u",$position))) 
									throw new Exception ("<p><b>&nbsp&nbspВведите корректную должность</b></p>");
								if (empty($NPERSONNEL))
									throw new Exception ("<p><b>&nbsp&nbspВведите табельный номер</b></p>");


								$doctor = Doctors::update_doctor($NPERSONNEL,$name,$surname,$position);

								printf("<p><b>&nbsp&nbspЗапись успешно изменена!</b></p>");
							}
							
						}   

					        catch(Exception $e)
					        {
					        	echo("<p><b>&nbsp&nbspВозникла ошибка: </b></p>") , $e->getMessage(), "\n";
					    	    die();
					        }	

					}
				if(isset($_POST['delete']))
					{
						try{

								if ((!preg_match("/^([а-яА-ЯЁёa-zA-Z]{1,30})$/u",$name)))
									throw new Exception	("<p><b>&nbsp&nbspВведите корректное имя</b></p>");
									
								if ((!preg_match("/^([а-яА-ЯЁёa-zA-Z]{1,30})$/u",$surname))) 
									throw new Exception ("<p><b>&nbsp&nbspВведите корректную фамилию</b></p>");
								if ((!preg_match("/^([а-яА-ЯЁёa-zA-Z]{1,30})$/u",$position))) 
									throw new Exception ("<p><b>&nbsp&nbspВведите корректную должность</b></p>");
								if (empty($NPERSONNEL))
									throw new Exception ("<p><b>&nbsp&nbspВведите табельный номер</b></p>");


								$doctor = Doctors::delete_doctor($NPERSONNEL);
								

								printf("<p><b>&nbsp&nbspЗапись успешно удалена!</b></p>");

							}
					
							
					        catch(Exception $e)
					        {
					        	echo("<p><b>&nbsp&nbspВозникла ошибка: </b></p>") , $e->getMessage(), "\n";
					    	    die();
					        }	
					}
			?>
		</main>
	</body>
</html>
