<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
   protected $fillable = [
   'link', 'remark','user_record','user_modified', 'article_id', 'status'
  ];

  protected $table = 'pictures';
  protected $primaryKey = 'id';
}
