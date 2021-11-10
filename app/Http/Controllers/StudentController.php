<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('student.index');
        // $students = Student::all();
        // return response()->json($students);
        // dd($students);
    }

    public function fetchStudent()
    {
        // $students = Student::all();
        $students = Student::orderBy('id', 'desc')->get();
        // $students = Student::orderBy('id', 'desc')->paginate(10);
        return response()->json([
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


        $validator = Validator::make($request->all(), [
            'name' => 'required|max: 191',
            'email' => 'required|email|max: 191',
            'course' => 'required|max: 191',
            'phone' => 'required|max: 191',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->errors()
            ]);
        } else {
            $student = new Student;
            $student->name = $request->name;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->course = $request->course;
            $student->save();

            return response()->json([
                'status' => 200,
                'messages' => 'Student Stored Successfully'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $student = Student::find($id);
        if ($student) {
            return response()->json([
                'status' => 200,
                'messages' => $student,
            ]);
        }else {
            return response()->json([
                'status' => 404,
                'messages' => 'Student Not Found',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required|max: 191',
            'email' => 'required|email|max: 191',
            'course' => 'required|max: 191',
            'phone' => 'required|max: 191',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'messages' => $validator->errors()
            ]);
        } else {
            $student = Student::find($id);

            if ($student) {
                $student->name = $request->name;
                $student->email = $request->email;
                $student->phone = $request->phone;
                $student->course = $request->course;
                $student->update();

                return response()->json([
                    'status' => 200,
                    'messages' => 'Student Updated Successfully'
                ]);
            }else {
                return response()->json([
                    'status' => 404,
                    'messages' => 'Student Not Found',
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $student = Student::destroy($id);   

        if($student == 1) {
            $success = true;
            $message = 'Student Data Deleted Successfully';
        }else {
            $success = true;
            $message = 'Student Data Not Found';
        }


        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
