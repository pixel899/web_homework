<?php
namespace Controllers;
use Models\patient;
class Patients {
	public static function create_patient ($name,$surname,$sex,$age) {
		$arr = array(
				"name" => $name,
				"surname" => $surname,
				"sex" => $sex,
				"age" => $age
				);
		$patient = patient::create($arr);
		return $patient;
	}
}
