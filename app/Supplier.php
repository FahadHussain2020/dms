<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
class Supplier extends Model
{
	public function categories(){
   		return $this->belongsToMany('app\Category');
   }
}
