<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\DbExec;
use DB;

class Users extends Model 
{
	protected $table = 'users';
	protected $primaryKey = 'uID';
	public $timestamps = false;

	
}
