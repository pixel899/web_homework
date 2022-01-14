<?php
try
{
 $con = new PDO("mysql:host=localhost; dbname=hospital",'mysql','mysql');
}
catch (PDOException $e)
{
      print "Не удалось подключиться к базе данных!" . $e->getMessage() . "<br/>";
      die();
}   
 ?>