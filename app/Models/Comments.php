<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\DbExec;
use DB;

class Comments extends Model 
{
	protected $table = 'comments';
	protected $primaryKey = 'comID';
	public $timestamps = false;

}
