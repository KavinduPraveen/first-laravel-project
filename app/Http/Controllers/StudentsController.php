<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;

class StudentsController extends Controller
{
    protected $students;

    public function __construct()
    {
        $this->students = new Students();
    }

    public function index()
    {
        $response['students'] = $this->students->all();

        return view('pages.students')->with($response);
    }

    public function vewRecords($stu_id)
    {
        $response['students'] = $this->students->find($stu_id);

        return view('pages.student_manage')->with($response);
    }

    public function add()
    {
        return view('pages.add_student');
    }

    public function save(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'school' => 'required',
            'address' => 'required',
            'nic' => 'required',
            'phone' => 'required',
            'status' => 'required',
         ]);
         //var_dump($request->all());
         if ($validator->fails()) {
            Session::forget('message');
            return redirect()->Back()->withInput()->withErrors($validator);

         }else{
            $this->students->create($request->all());
            return redirect()->back();
         }


    }
}
