<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<meta http-equiv="Content-Type" content="text/html">
<link rel="stylesheet" href="style.css"  type="text/css">
<title>Осмотр</title>
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
		<div class="field1">
			<p><b> Дата осмотра:</b></p><input class="field" type="date" name="date"></p>
			<p><b> Номер амбулаторной карты:</b></p><input class="field" type="number" name="NCARD" size="30" style="width: 180px"></p>
			<p><b> Табельный номер врача:</b></p><input class="field" type="number" name="NPERSONNEL" size="30" style="width: 180px"></p>
	    </div>
	    <div class="field1">
			<b>Диагноз:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b><?php
			require 'connect.php';
			$sql = "SELECT * FROM diagnosis";
			$result_select = mysqli_query($connection, $sql);
			echo "<select name = 'diagnos' class='select-css'>";
	  	    echo "<option>Выбор</option>";
	  		while($object = mysqli_fetch_object($result_select)){
	        echo "<option> $object->title </option>";}
	    	echo "</select>";
	    	?>
	    	<p><b>Состояние:&nbsp&nbsp</b>
	    	<?php
			$sql = "SELECT * FROM state_health";
			$result_select = mysqli_query($connection, $sql);
			echo "<select name='state' class='select-css' style='margin-left: -2.5px;'>";
	  	    echo "<option>Выбор</option>";
	  		while($object = mysqli_fetch_object($result_select)){
	        echo "<option> $object->title </option>";}
	    	echo "</select>";
	    	?>
	        </p>
	    </div>
        <div class="field1">
	        <p><b>Назначения:</b></p><p><textarea id = "textarea" class="field" type="text" name="prescription" ></textarea></p>
	        <p><b>Процедуры:</b></p><textarea id = "textarea" class="field" type="text" name="procedures"></textarea></p>
		    <p><b>Коментарий:</b></p><textarea id = "textarea" class="field" type="text" name="comment"></textarea></p>
		    <p><b>Номер палаты:&nbsp&nbsp</b><input class="field" type="number" name="room" size="30" style="width: 50px"></p>
	    </div>
   		    <p><button class="submit" type="submit" name="submit" style="width: 100px">Сохранить</button></p>
   		   

	</form>
</div>
       
<?php


$date = trim($_POST['date']);
$NCARD = trim($_POST['NCARD']);
$NPERSONNEL = trim($_POST['NPERSONNEL']);
$diagnos = trim($_POST['diagnos']);
$state = trim($_POST['state']);
$prescription = trim($_POST['prescription']);
$procedures = trim($_POST['procedures']);
$room = trim($_POST['room']);
$comment = trim($_POST['comment']);






if(isset($_POST['submit']))
{

$id_diagnos = mysqli_query ($connection,"SELECT ID FROM `diagnosis` WHERE `title` = '$diagnos'");
$row = mysqli_fetch_assoc($id_diagnos);
$w = $row['ID'];
$id_state = mysqli_query ($connection,"SELECT ID FROM `state_health` WHERE `title` = '$state'");
$row2 = mysqli_fetch_assoc($id_state);
$z = $row2['ID'];

    

$res = mysqli_query ($connection, "INSERT INTO `document` (ID_NCARD,ID_NPERSONNEL,date,ID_diagnosis,ID_state,prescription,procedures,room,comment) VALUES ('{$NCARD}','{$NPERSONNEL}','{$date}','{$w}','{$z}','{$prescription}','{$procedures}','{$room}','{$comment}')");


if($res) {printf("<p><b>&nbsp&nbspЗапись успешно добавлена!</b></p>");}
else {printf("<p><b>&nbsp&nbspВозникли ошибки при заполнении формы!</b></p>");}
}
?>    

            












</body>
</html>