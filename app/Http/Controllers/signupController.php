<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Input, File;
use Request;
use App\Http\Requests\RuleStudent;
use Illuminate\Support\Facades\Session;
class signupController extends Controller
{
    public function index()
    {
        return view('student');
    }

    public function create()
    {
        //
    }


    public function displayInfor(RuleStudent $request)
    {
        $user = [
            'name' => $request->input("name"),
            'age' => $request->input("age"),
            'date' => $request->input("date"),
            'phone' => $request->input("phone"),
            'web' => $request->input("web"),
            'address' => $request->input("address"),
        ];
        $users = Session::get('users', []);

        // Thêm dữ liệu mới vào danh sách
        $users[] = $request->all();
    
        // Lưu lại danh sách vào session
        Session::put('users', $users);
        return view('student')->with('user', $user);
    }

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
