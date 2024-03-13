<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Mobile;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Student::get();
        // return view('student.index');
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

        // 學生
        $data = new Student;
        $data->name = $input['name'];
        $data->save();

        // 手機
        $id = $data->id;
        $item = new Mobile;
        $item->student_id = $id;
        $item->mobile = $input['mobile'];
        $item->save();

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
