<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Mobile;
use App\Models\Loves;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Student::get();
        $data = Student::with('mobileRelation')->with('loveRelations')->get();
        // foreach ($data as $key => $value) {
            // dd($value);
            // $data[0]
            //loveRelations 1
            //fetchAll
            //foreach
            // echo ("$value->name<br>");
            // $data[1]
            //loveRelations 3
            //fetchAll
            //foreach
            
        //     foreach ($value->loveRelations as $key2 => $value2) {
        //         // echo ("&nbsp;&nbsp;&nbsp;&nbsp;$value2->love <br>");
        //     }
        // }
        return view('student.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $input = $request->except('_token');
        $loves = $input['love'];
        $loveArr = explode(",", $loves);

        // student 第一張資料表，總表
        $data = new Student;
        $data->name = $input['name'];
        $data->save();

        // mobile 第二張資料表，子表與第一張資料表關聯
        $id = $data->id;
        $item = new Mobile;
        $item->student_id = $id;
        $item->mobile = $input['mobile'];
        $item->save();

        // love 第三張資料表，子表與第一張資料表關聯
        $id = $data->id;
        foreach ($loveArr as $key => $value) {
            $itemLove = new Loves;
            $itemLove->student_id = $id;
            $itemLove->love = $value;
            $itemLove->save();
        }

         return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        // dd("$student edit");
        $id = $student->id;
        $data = Student::where('id', $id)->with('mobileRelation')->with('loveRelations')->first();
        // dd($data);
        // $data['loves'] = 'php,laravel,js';
        
        //relation to arry
        $loveArr = [];
        foreach ($data->loveRelations as $key => $value) {
            array_push($loveArr, $value->love);
        }
        // dd($loveArr);

        // array to string
        $loves = implode(",", $loveArr);
        // dd($loves);

        // data['loves']
        $data['loves'] = $loves;
        // dd($data);

        return view('student.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        // $input = $request->all();
        // dd($input); //先用all與dd找出要排除的項目
        $input = $request->except('_token','_method');
        $loves = $input['love'];
        $loveArr = explode(",", $loves);

        // update student 第一張資料表，總表
        $id=$student->id;
        $data=Student::where('id',$id)->first();
        $data->name=$input['name'];
        $data->save();
        
        //update mobiles 第二張資料表，子表與第一張資料表關聯
        //方法一，直接更新
        // $item = Mobile::where('student_id',$id)->first();
        // $item->mobile = $input['mobile'];
        // $item->save();

        //方法二，刪除資料後，再新增資料，動金流的，就不要刪，不要用此方法
        Mobile::where('student_id',$id)->delete();
        $item = new Mobile;
        $item->student_id = $id;
        $item->mobile = $input['mobile'];
        $item->save();

        // loves
        // delete loves
        Loves::where('student_id', $student->id)->delete();

        // add love
        foreach ($loveArr as $key => $value) {
            $itemLove = new Loves;
            $itemLove->student_id = $id;
            $itemLove->love = $value;
            $itemLove->save();
        }

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //刪 love 資料
        Loves::where('student_id',$student->id)->delete();

        //刪 mobile 資料
        Mobile::where('student_id',$student->id)->delete();

        //刪 student 資料
        Student::where('id',$student->id)->delete();
        
        
        return redirect()->route('students.index');
    }
}
