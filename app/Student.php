<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  public function lesson()
  {
    return $this->hasMany('App\Lesson');//hasMany('App\Lesson', 'student_id', 'id');
    //省略出来るパターン第二引数が テーブル名単数形_id で第三引数が id である
  }
}
