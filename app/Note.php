<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
  protected $fillable = [
      'title', 'content', 'important',
  ];

  public function isImportant()
  {
    return $this->important == 1;
  }
}
