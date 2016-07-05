<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\DbExec;
use DB;

class Users extends Model 
{
	protected $table = 'users';
	protected $primaryKey = 'uID';
	public $timestamps = false;



	public static function authentication($params) {

		$md5Pass = md5($params['password']);

		return self::where('uUsername', $params['username'])->where('uPassword', $md5Pass)->first();
	}
	
}
