<?php

namespace App\Domains\Student\Services;

use App\Domains\Student\Models\Student;
use App\Services\BaseService;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

/**
 * Class StudentService.
 */
class StudentService extends BaseService
{

    use WithFileUploads;
    /**
     * StudentService constructor.
     *
     * @param  StudentService  $studentService;
     */
    public function __construct(Student $student)
    {
        $this->model = $student;
    }

    public function createStudent(array $data = [], $request){
        
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');
            $data['image'] = Storage::url($filePath);
        } else {
            $data['image'] = null;
        }
        //dd($data);
        $this->model->create([
            "name"      => $data["name"],
            "age"       => $data["age"],
            "gender"    => $data["gender"],
            "email"     => $data["email"],
            "image"     => $data["image"],
        ]);
    }

    public function updateStudent($id, $request){
        $student = Student::findOrFail($id);
        //dd($request->all());
        $imagePath = $student->image;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            $imagePath = Storage::url($filePath);
        }

        $student->update([
            'name'   => $request->name,
            'age'    => $request->age,
            'gender' => $request->gender,
            'email'  => $request->email,
            'image'  => $imagePath,
        ]);
        $student->save();
    }

}
