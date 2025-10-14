<?php

namespace App\Http\Controllers\Backend;

use App\Domains\Student\Models\Student;
use App\Domains\Student\Services\StudentService;
use App\Http\Requests\Backend\StoreStudentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController
{
    protected $studentService;

    public function __construct(StudentService $studentService){
        $this->studentService = $studentService;
    }
    

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index() {
        return view("backend.student.index");
    }
    public function create() { 
        return view("backend.student.create");
    }
    public function store(StoreStudentRequest $request){
        $student = $this->studentService->createStudent( $request->validated(), $request);

        return redirect()
            ->route("admin.student.index")
            ->with("success","Add student successfully!");
    }

    public function edit(Request $request, $id){
        $student = Student::find($id);

        return view("backend.student.edit", compact("student"));
     }

    public function update(StoreStudentRequest $request, $id) {
        $student = $this->studentService->updateStudent($id, $request);

        return redirect()->route("admin.student.index")->with("success","Student has updated!");
        
    }

    public function show($id) {
        $student = Student::with('classrooms')->findOrFail( $id );
        //dd($student);
        return view("backend.student.show", compact("student"));   
    }

    public function destroy($id) {
        $student = Student::find($id);
        $student->delete();

        return redirect()->route("admin.student.index")->with("success","Student has deleted!");
    }
}