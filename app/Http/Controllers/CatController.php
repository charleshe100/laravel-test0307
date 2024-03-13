<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('cat.index');
        $data = DB::select('SELECT * FROM cats');
        // $data['text'] = '123';        

         return view('cat.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // dd('Hollo store');
        $input = $request->except('_token');
        //except('_token')是排除了名為 _token 的項目，通常這是在表單驗證時使用的 CSRF token。這麼做可以避免 CSRF 攻擊。
        $now = now(); // 現在的時間
        DB::table('cats')->insert([
                'name' => $input['name'],
                'mobile' => $input['mobile'],
                'address' => 999,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        return redirect()->route('cats.index');
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
        dd("Hello $id");
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
        dd("delete $id");
    }

    public function excel(){
        dd('hello cats excel');
    }
}
