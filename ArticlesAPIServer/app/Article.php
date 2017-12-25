<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
   protected $fillable = [
   'title', 'content','remark','user_record','user_modified', 'status'
  ];

  protected $table = 'articles';
  protected $primaryKey = 'id';

  public function categories(){
    return $this->belongsTo('App\Category', 'category_id', 'id');
  }
}
