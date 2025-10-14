<?php

namespace App\Domains\Teacher\Services;


use App\Domains\Teacher\Models\Teacher;
use App\Services\BaseService;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class TeacherService.
 */
class TeacherService extends BaseService
{
    /**
     * TeacherService constructor.
     *
     * @param  TeacherService  $teacherService;
     */
    public function __construct(Teacher $teacher)
    {
        $this->model = $teacher;
    }

    public function createTeacher(array $data = [], $request){
        
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');
            $data['image'] = Storage::url($filePath);
        } else {
            $data['image'] = null;
        }
        $this->model->create([
            "name"          => $data["name"],
            "age"           => $data["age"],
            "gender"        => $data["gender"],
            "phone_number"  => $data["phone_number"],
            "email"         => $data["email"],
            "image"         => $data["image"],
        ]);
    }

    public function updateTeacher($id, array $data = [] , $request){

        $teacher = Teacher::findOrFail($id);
        $imagePath = $teacher->image;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');
            $imagePath = Storage::url($filePath);
        }

        $teacher->update([
            'name'          => $data['name'],
            'age'           => $data['age'],
            'gender'        => $data['gender'],
            'phone_number'  => $data['phone_number'],
            'email'         => $data['email'],
            'image'         => $imagePath,
        ]);
        $teacher->save();
    }
}
