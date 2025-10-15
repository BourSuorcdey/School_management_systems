<?php

namespace App\Http\Controllers\Backend;

use App\Domains\Teacher\Models\Teacher;
use App\Domains\Teacher\Services\TeacherService;
use App\Http\Requests\Backend\StoreTeacherRequest;
use Illuminate\Http\Request;


class TeacherController
{
    protected $teacherService;

    public function __construct(TeacherService $teacherService){
        $this->teacherService = $teacherService;
    }
    

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index() {
        return view("backend.teacher.index");
    }
    public function create() { 
        return view("backend.teacher.create");
    }
    public function store(StoreTeacherRequest $request){
        $teacher = $this->teacherService->createTeacher($request->validated(), $request);
        
        return redirect()
        ->route("admin.teacher.index", $teacher)
        ->with("success","Add teacher successfully!");
    }

    public function edit($id){
        $teacher = Teacher::findOrFail($id);

        return view("backend.teacher.edit", compact("teacher"));
     }

    public function update(StoreTeacherRequest $request, $id) {
        $teacher = $this->teacherService->updateTeacher($id, $request->validated(), $request);

        return redirect()->route("admin.teacher.index", compact('teacher'))->with("success","Teacher has updated!");
        
    }

     public function show($id) {
        $teacher = Teacher::with( 'classrooms')->findOrFail($id);
        return view("backend.teacher.show", compact("teacher"));   
    }

    public function destroy($id) {
    $teacher = Teacher::find($id);
    $teacher->delete();

    return redirect()->route("admin.teacher.index")->with("success","Teacher has deleted!");
    }
}