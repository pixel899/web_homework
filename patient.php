<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<meta http-equiv="Content-Type" content="text/html">
<link rel="stylesheet" href="style.css"  type="text/css">
<title>Пациент</title>
</head>
<body>
<img id="pic" src="images/iconfinder_medic.png" width="50" height="50" alt="lorem">
<h1 id="header">Справочно-учетная система СТАЦИОНАР</h1>

<div class = main>

<ul id="menu">

	<li><a href="index">Журнал</a></li>

    <li><a href="newpatient">Новый пациент</a></li>

    <li><a href="diagnos">Новый Осмотр</a></li>

     <li><a href="patient">Найти пациента</a></li>

    <li><a href="doctor">Врачи</a></li>

</ul>

<div class="content">
	<form method='post' action=''>
		<p><input class="field" type="text" placeholder="№ амбулаторной карты" name="ncard" size="30" ></p>
		<p><input class="field" type="text" placeholder="Имя" name="name" size="30"></p>
		<p><input class="field" type="text" placeholder="Фамилия" name="surname" size="30"></p>
		<p><input class="field" type="number" placeholder="Возраст" step="1" name="age"></p>
		
		<button class="submit" type="submit" name="submit" style="width: 60px">Поиск</button>
	</form>
</div>

<table class="table">

	<thead>
		<tr>
			<th>№ амбулаторной карты</th>
			<th>Имя</th>
			<th>Фамилия</th>
			<th>Возраст</th>
		</tr>
	</thead>
<tbody>


<?php
require 'connect.php';

if(isset($_POST['ncard']))
{
$ncard = trim($_POST['ncard']);
}
if(isset($_POST['name']))
{
$name = trim($_POST['name']);
}
if(isset($_POST['surname']))
{
$surname = trim($_POST['surname']);
}
if(isset($_POST['age']))
{
$age = trim($_POST['age']);
}


if(isset($_POST['submit']))
{



$result = mysqli_query ($connection, "SELECT * FROM patient WHERE `NCARD`='$ncard' OR `name`='$name' OR `surname`='$surname' OR `age`='$age' ");

$count = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

if ($count > 0)
{
do
{
	
	 
?>
	<tr>
		<td><?php echo $row['NCARD']; ?></td>
		<td><?php echo $row['name']; ?></td>
		<td><?php echo $row["surname"]; ?></td>
		<td><?php echo $row["age"]; ?></td>	
	</tr>
<?php  

}while ($row = mysqli_fetch_assoc($result));  
}
else
{
  echo ("<p>&nbsp&nbsp&nbspПо вашему запросу ничего не найдено</p>");
}
}
?>  	
</tbody>
</table>






















</div>
</body>
</html>