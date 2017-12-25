<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
	   'name'
	];

	protected $table = 'categories';
	protected $primaryKey = 'id';

	public function articles(){
	  return $this->belongsToMany('App\Article','articles_categories','category_id','article_id');
	}
}
