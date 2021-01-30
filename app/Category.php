<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Supplier;
class Category extends Model
{
   protected $guarded=[];

   public function suppliers(){
   		return $this->belongsToMany('app\Supplier');
   }
}
