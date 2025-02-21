<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Input, File;
use Request;
use App\Http\Requests\RuleStudent;
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
        // $user =[
        //     'name'=>$name =$Request -> input("name"),
        //     'age'=>$age =$Request -> input("age"),
        //     'date'=>$date =$Request -> input("date"),
        //     'phone'=>$phone =$Request -> input("phone"),
        //     'web'=>$web =$Request -> input("web"),
        //     'address'=>$address =$Request -> input("address"),
        // ];
        // return view('student')->with('user', $user);
        $user = [
            'name' => $request->input("name"),
            'age' => $request->input("age"),
            'date' => $request->input("date"),
            'phone' => $request->input("phone"),
            'web' => $request->input("web"),
            'address' => $request->input("address"),
        ];
        return view('student')->with('user', $user);
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
