<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\DbExec;

class Articles extends Model 
{
	protected $table = 'articles';
	protected $primaryKey = 'aID';
	public $timestamps = false;

}
