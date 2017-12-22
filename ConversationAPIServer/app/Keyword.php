<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
  protected $fillable = [
   'indonesian_text', 'chinese_text','voice_link','daily_usage_limit','user_record','user_modified','remark'
  ];

  protected $table = 'keywords';
  protected $primaryKey = 'id';
}
