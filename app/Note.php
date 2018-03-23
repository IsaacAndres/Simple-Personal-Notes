<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
  protected $fillable = [
      'user_id', 'title', 'content', 'important',
  ];

  public function isImportant()
  {
    return $this->important == 1;
  }
}
