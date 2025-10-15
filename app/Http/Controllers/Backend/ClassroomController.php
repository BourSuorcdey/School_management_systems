<?php

namespace App\Http\Controllers\Backend;

use App\Domains\Classroom\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController
{
    public function index() {
        return view("backend.classroom.index");
    }
    public function create() { 
        return view("backend.classroom.create");
    }
    public function store(Request $request){
        $request->validate([
            "name"=> "required",
        ]);
        Classroom::create([
            "name"=> $request->name,
        ]);    
        return redirect()
            ->route("admin.classroom.index")
            ->with("success","Add classroom successfully!");
    }

    public function edit(Request $request, $id){
        $classroom = Classroom::findOrFail($id);

        return view("backend.classroom.edit", compact("classroom"));
     }

    public function update(Request $request, $id) {
        $request->validate([
            "name"=> "required",
            ]);
        Classroom::findOrFail($id)
            ->update([
                "name"=> $request->name,
                ]);
        return redirect()->route("admin.classroom.index")->with("success","Classroom has updated!");
        
    }

    public function destroy($id) {
        $classroom = Classroom::findOrFail($id);
        $classroom->delete();

        return redirect()->route("admin.classroom.index")->with("success","Classroom has been deleted!");
    }
    public function show($id) {
        $classroom = Classroom::with('teachers')->findOrFail( $id );
        return view('backend.classroom.show', compact('classroom'));   
    }

}   