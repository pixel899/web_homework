<?php
namespace Models;
use \Illuminate\Database\Eloquent\Model;
class doctor extends Model {
	protected $table = "doctor";
	protected $fillable = ["NPERSONNEL","name","surname","position"];
	}
