<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\DbExec;

class Categories extends Model 
{
	protected $table = 'categories';
	protected $primaryKey = 'cID';
	public $timestamps = false;

	

}
