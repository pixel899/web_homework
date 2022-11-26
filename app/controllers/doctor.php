<?php
namespace Controllers;
use Models\doctor;
class Doctors {
	public static function show_doctor(){
		$doctor = doctor::all();
		return $doctor;
	}
	public function update_doctor($NPERSONNEL,$name,$surname,$position): void
	{
		$doctor = doctor::find($NPERSONNEL);
		$doctor->name = $name;
		$doctor->surname = $surname;
		$doctor->position = $position;
		$doctor->save();
	}
	public function delete_doctor($NPERSONNEL): void
	{
		$doctor = doctor::find($NPERSONNEL);
		$doctor->delete();
	}
}
