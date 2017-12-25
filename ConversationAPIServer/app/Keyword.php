<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
  protected $fillable = [
   'indonesian_text', 'chinese_text','voice_link','user_record','user_modified','remark', 'status'
  ];

  protected $table = 'keywords';
  protected $primaryKey = 'id';

  public function keyword(){
	  return $this->belongsTo('App\Category', 'category_id', 'id');
	}
}
