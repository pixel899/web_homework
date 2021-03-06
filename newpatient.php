<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf8">
		<meta name="viewport" content="width=device-width">
		<meta http-equiv="Content-Type" content="text/html">
		<link rel="stylesheet" href="style.css"  type="text/css">
		<title>Новый пациент</title>
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
					<p><b>Имя: </b><input class="field" type="text" name="name" size="30" style="margin-left: 39px"></p>
					<p><b>Фамилия: </b><input class="field" type="text" name="surname" size="30" style="margin-left: 5px"></p>
					<p><b>Пол:  </b><select class="field" name="sex" style="margin-left: 40px">
						<option>м</option>
						<option>ж</option>
					</select></p>
					<p><b>Возраст: </b><input class="field" type="number" step="1" name="age" style= "margin-left: 12px; width: 5em"></p>
					<button class="submit" type="submit" name="submit">Создать</button>
				</form>
			</article>
			<?php 
			require 'connect.php';
			if(isset($_POST['name']))
			{
				$name = trim($_POST['name']);
			}
			if(isset($_POST['surname']))
			{
				$surname = trim($_POST['surname']);
			}
			$sex = trim($_POST['sex']);
			if(isset($_POST['age']))
			{
				$age = trim($_POST['age']);
			}

			if(isset($_POST['submit']))
			{	
				try{

					if ((!preg_match("/^([а-яА-ЯЁёa-zA-Z]{1,30})$/u",$name)))
						throw new Exception	("<p><b>&nbsp&nbspВведите корректное имя</b></p>");
						
					if ((!preg_match("/^([а-яА-ЯЁёa-zA-Z]{1,30})$/u",$surname))) 
						throw new Exception ("<p><b>&nbsp&nbspВведите корректную фамилию</b></p>");
						
					if (empty($age))
						throw new Exception ("<p><b>&nbsp&nbspВведите возраст</b></p>");


					$sql = "CALL insert_patient (?,?,?,?)";		
					$result = $con->prepare($sql);
					$result->execute([$name,$surname,$sex,$age]);

					printf("<p><b>&nbsp&nbspЗапись успешно добавлена!</b></p>");

		        }
		        catch (PDOException $e)
				{
					echo("<p><b>&nbsp&nbspВозникла непредвиденная ошибка: </b></p>") , $e->getMessage() . "<br/>";
					die();
				}   

		        catch(Exception $e){
		        	echo("<p><b>&nbsp&nbspВозникла ошибка: </b></p>") , $e->getMessage(), "\n";
		    	    die();
		        }	
			}
			?> 
		</main>
	</body>
</html>