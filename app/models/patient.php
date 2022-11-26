<?php
namespace Models;
use \Illuminate\Database\Eloquent\Model;
class patient extends Model {
	protected $table = "patient";
	protected $fillable = ["name","surname","sex","age"];
	}
