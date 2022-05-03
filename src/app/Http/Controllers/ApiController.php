<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Resources\StudentResource;

class ApiController extends Controller
{
    public function getAllStudents() {
        $student_resource = StudentResource::collection(Student::all());
        return response($student_resource, 200);
    }

    public function createStudent(Request $request) {
        $student = new Student;
        $student->fill($request->all());
        $student->save();
        return response()->json([
            "message" => "student record created"
        ], 201);
    }

    public function getStudent($id) {
        if(Student::where('id',$id)->exists()){
            $student = Student::find($id);
            $student_resource = new StudentResource($student);
            return response($student_resource, 200);
        } else{
            return response()->json([
                "message" => "Student not found"
            ], 404);
        }
    }

    public function updateStudent(Request $request, $id) {
        if(Student::where('id',$id)->exists()){
            $student = Student::find($id);
            $student->name = is_null($request->name) ? $student->name : $request->name;
            $student->age = is_null($request->age) ? $student->age : $request->age;
            $student->sex = is_null($request->sex) ? $student->sex : $request->sex;
            $student->email = is_null($request->email) ? $student->email : $request->email;
            $student->course = is_null($request->course) ? $student->course : $request->course;
            $student->save();
            return response()->json([
                "message" => "records update successfully"
            ],200);
        } else{
            return response()->json([
                "message" => "Student not found"
            ], 404);
        }
    }

    public function deleteStudent ($id) {
        if(Student::where('id', $id)->exists()) {
            $student = Student::find($id);
            $student->delete();
            return response()->json([
            "message" => "records deleted"
            ], 202);
        } else {
            return response()->json([
            "message" => "Student not found"
            ], 404);
        }
    }
}
