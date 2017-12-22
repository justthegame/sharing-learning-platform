<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
   protected $fillable = [
   'title', 'content','remark','user_record','user_modified'
  ];

  protected $table = 'articles';
  protected $primaryKey = 'id';
}
