<?php


namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Student;
use App\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\BasicRequest;
//use Validator;

class StudentController extends Controller
{
  public function index ()
  {
    $students = new Student();
    $datas = $students::where('del_flg', 0)->orderBy('id', 'asc')->get();

    // Log::debug($datas);

    return view ('student/index', [
      'datas' => $datas,

    ]);
  }


  public function create_form(StudentRequest $request)
  {
    // Log::debug($request);

    // $validator = Validator::make($request->all(),[
    //   'name' => 'required|string|max:25',
    //   'age' => 'required|numeric|max:3',
    //   'sex' => 'required|max:8',
    //   'address' => 'required|max:25',
    //   'status' => 'required',
    //   'le_name' => 'required|max:15',
    //   'tsk_per' => 'nullable|max:3'
    // ]);
    //
    // if ($validator->fails()) {
    //         return redirect()->back()
    //         ->withInput()
    //         ->withErrors($validator);
    //     }

    $student = new Student();

    $student->timestamps = false;
    $student->name = $request->name;
    $student->age = $request->age;
    $student->sex = $request->sex;
    $student->address = $request->address;
    $student->save();

    //$result = $student->save();
    // Log::debug($student);
    //Log::debug($result);

    $lesson = new Lesson();
    //$lesson->timestamps = false;
    $lesson->student_id = $student->id;
    $lesson->status = $request->status;
    $lesson->le_name = $request->le_name;
    $lesson->tsk_per = $request->tsk_per;
    $lesson->save();

    //$result = $lesson->save();

    //Log::debug($lesson);
    //Log::debug($result);

    return redirect()->route('home');
  }



  public function create ()
  {
    return view ('student/create');
  }



  public function tsk(int $id)
  {
    $data = Student::find($id);
    //Log::debug($data);

    if (empty($data)) {
      return redirect()->route('home');
    }


    $s_name = $data->name;
    //Log::debug($s_name);
    $s_age = $data->age;
    $s_sex = $data->sex;
    $s_address = $data->address;


    $datas = DB::table('lessons')
    ->select('*','lessons.id as lesson_id','students.id as student_id')
    ->leftJoin('students', 'lessons.student_id', '=', 'students.id')
    ->where('student_id', '=', $id)
    ->get();
    //Log::debug($datas);

    // var_dump($data);
    // exit;
    return view ('student/tsk', [
      'data' => $datas,
      'student' => $data,
       ]);
  }


  public function edit(int $id)//students.id
  {
    $data = Student::find($id);
    //Log::debug($data);

    if (empty($data)) {
      return redirect()->route('home');
    }

    // $datas = DB::table('lessons')
    // //->select('*','lessons.id as l_id','students.id as s_id')
    // ->leftJoin('students', 'lessons.student_id', '=', 'students.id')
    // ->where('student_id', '=', $id)
    // ->get();

    //Log::debug($datas);
    // var_dump($data->name);
    // exit;

    // if (!empty($data)) {
    //   foreach($data as $student);
    // }
    //Log::debug($s_data);

    return view ('student/edit', [
      'data' => $data,

    ]);

  }

  public function update(BasicRequest $request, $id)
  {
    //Log::debug($request);

    $student = Student::find($id);
    //Log::debug($student);

    $student->timestamps = false;
    $student->name = $request->name;
    $student->age = $request->age;
    $student->sex = $request->sex;
    $student->address = $request->address;
    $student->update();

    //$result = $student->update();
    //Log::debug($student);
    //Log::debug($result);

    return redirect()->route('tsk',['id' => $id]);


  }


  public function del(int $id)
  {
    $student = Student::find($id);
    //Log::debug($student);

    $student->timestamps = false;
    $student->del_flg = 1;
    //$student->save();
    $result = $student->save();
    //Log::debug($student->del_flg);
    //Log::debug($result);

    return redirect()->route('home');
  }


  public function comp()
  {
    $students = new Student();
    $datas = $students::where('del_flg', 1)->orderBy('id', 'asc')->get();
    //Log::debug($datas);

    return view('student/complist', [
      'datas' => $datas
    ]);
  }


  public function redata(int $id)
  {
    $student = Student::find($id);
    //Log::debug($student);

    $student->timestamps = false;
    $student->del_flg = 0;
    $student->save();
    //$result = $student->save();
    //Log::debug($student->del_flg);
    //Log::debug($result);

    return redirect()->route('home');

  }

}
