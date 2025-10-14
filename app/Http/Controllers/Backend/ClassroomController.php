<?php

namespace App\Http\Controllers\Backend;

use App\Domains\Classroom\Models\Classroom;

class ClassroomController
{
 
    public function show($id) {
        $classroom = Classroom::with('teachers')->findOrFail( $id );
        //dd($classroom);
        return view('backend.classroom.show', compact('classroom'));   
    }

}   