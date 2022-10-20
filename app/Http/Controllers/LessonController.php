<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Student;
use App\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\LessonRequest;

class LessonController extends Controller
{
  public function tsk_create (int $id)
  {
    $student = Student::find($id);
    //Log::debug($student);

    if (empty($student)) {
      return redirect()->route('home');
    }

    if (!empty($student)) {
      return view('lesson/tsk_create', [
        'data' => $student,
      ]);
    }


  }

  public function tsk_form ($s_id, LessonRequest $request)
  {
    //Log::debug($s_id);
    //Log::debug($request);

    $lesson = new Lesson();

    $lesson->student_id = $s_id;
    $lesson->status = $request->status;
    $lesson->le_name = $request->le_name;
    $lesson->tsk_per = $request->tsk_per;
    $lesson->save();

    //$result = $lesson->save();
    //Log::debug($lesson);
    //Log::debug($result);

    return redirect()->route('tsk', ['id' => $s_id,]);
  }



  public function tsk_edit (int $id) //lesson_id 10  =
  {
    $lesson = Lesson::find($id);//lessons.idからデータ取得
    //Log::debug($lesson);

    if (empty($lesson)) {
      return redirect()->route('home');
    }

    $s_id = $lesson->student_id;
    //Log::debug($s_id);

    $data = DB::table('lessons')
    ->select('*','lessons.id as lesson_id','students.id as student_id')
    ->leftJoin('students', 'lessons.student_id', '=', 'students.id')
    ->where('student_id', '=', $s_id)
    ->first();
    //Log::debug($datas);
    // var_dump($datas);
    // exit
//タスク一つずつ
    // $s_id = $lesson->student_id;
    // $student = Student::where('id', '=', $s_id)->get();

    return view('lesson/tsk_edit',[
      'data' => $data,
      'lesson' => $lesson,

    ]);
  }


  public function tsk_delete (int $id) //lesson_id
  {
    $lesson = Lesson::find($id);
    //Log::debug($lesson);

      if (empty($lesson)) {
        return view('home');
      }

    $s_id = $lesson->student_id;
    //Log::debug($s_id);

    $result = $lesson->delete();
    //Log::debug($result);

    return redirect()->route('tsk',['id' => $s_id,]);

  }

//   public function erase(int $id)
//   {
//     $student = Student::find($id);
//     $student->delete();
//
//     return redirect()->route('home');
//   }
//
  public function tsk_update(LessonRequest $request, $l_id)
  {
    //Log::debug($request);

    $lesson = Lesson::find($l_id);
    //Log::debug($lesson);

    if (!empty($lesson)) {
      $lesson->student_id = $lesson->student_id;
      $lesson->status = $request->status;
      $lesson->le_name = $request->le_name;
      $lesson->tsk_per = $request->tsk_per;
      $lesson->update();
      //$result = $lesson->update();
    }
    //Log::debug($result);
    //Log::debug($lesson);

    return redirect()->route('tsk',['id' => $lesson->student_id,]);

  }

  public function erase(int $id)
  {
    $student = Student::find($id);
    //Log::debug($student);

    if (empty($student)) {
      return view('home');
    }

    //$student->delete();
    $result = $student->delete();
    //Log::debug($result);


    return redirect()->route('comp');

  }

}
