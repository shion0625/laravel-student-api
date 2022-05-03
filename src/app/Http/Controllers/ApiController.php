<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Resources\StudentResource;
use App\Http\Requests\Student\StoreStudentRequest;

final class ApiController extends Controller
{
    public function getAllStudents() {
        $student_resource = StudentResource::collection(Student::all());
        return response()->json([
            'success' => true,
            'message' => 'list success',
            $student_resource
        ], 200);
    }

    public function createStudent(Request $request) {
        $student = new Student;
        $student->fill($request->all());
        $student->save();
        $student_resource = new StudentResource($student);
        return response()->json([
            'success' => true,
            "message" => "student record created",
            $student_resource
        ], 201);
    }

    public function getStudent($id) {
        if(Student::where('id',$id)->exists()){
            $student = Student::find($id);
            $student_resource = new StudentResource($student);
            return response()->json([
                'success' => true,
                'message' => 'get student success',
                $student_resource
            ], 200);
        } else{
            return response()->json([
                'success' => false,
                "message" => "Student not found"
            ], 404);
        }
    }

    public function updateStudent(Request $request, $id) {
        if(Student::where('id',$id)->exists()){
            $student = Student::find($id);
            $student->name = null === $request->name ? $student->name : $request->name;
            $student->age = null === $request->age ? $student->age : $request->age;
            $student->sex = null === $request->sex ? $student->sex : $request->sex;
            $student->email = null === $request->email ? $student->email : $request->email;
            $student->course = null === $request->course ? $student->course : $request->course;
            $student->save();
            $student_resource = new StudentResource($student);
            return response()->json([
                'success' => true,
                'message' => 'records update successfully',
                $student_resource
            ], 200);
        } else{
            return response()->json([
                'success' => false,
                "message" => "Student not found"
            ], 404);
        }
    }

    public function deleteStudent ($id) {
        if(Student::where('id', $id)->exists()) {
            $student = Student::find($id);
            $student->delete();
            $student_resource = new StudentResource($student);
            return response()->json([
                'success' => true,
                'message' => 'records delete successfully',
                $student_resource
            ], 202);
        } else {
            return response()->json([
            'success' => false,
            "message" => "Student not found"
            ], 404);
        }
    }
}
