<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\DbExec;

class Navigators extends Model 
{
	protected $table = 'navigator';
	protected $primaryKey = 'navID';
	public $timestamps = false;
}
