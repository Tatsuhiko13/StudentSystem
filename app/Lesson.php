<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{



  public function student()
  {
  //Studentモデルのデータを取得する
  return $this->belongsTo('App\Student');
  }


  public function findByJoinStudentWhereStudentId($id) {

    $this->select('*','lessons.id as lesson_id','students.id as student_id')
    ->leftJoin('students', 'lessons.student_id', '=', 'students.id')
    ->where('student_id', '=', $id)
    ->get();

  }

}
