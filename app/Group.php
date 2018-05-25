<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['user_id', 'name'];

    public function notes()
    {
      return $this->hasMany(Note::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }    
}
