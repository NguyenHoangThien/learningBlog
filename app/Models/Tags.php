<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\DbExec;
use DB;

class Tags extends Model 
{
	protected $table = 'tags';
	protected $primaryKey = 'tID';
	public $timestamps = false;

	

}
