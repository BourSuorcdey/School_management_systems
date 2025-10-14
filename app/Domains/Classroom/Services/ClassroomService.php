<?php

namespace App\Domains\Classroom\Services;

use App\Domains\Student\Models\Student;
use App\Http\Requests\Backend\StoreStudentRequest;
use App\Services\BaseService;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

/**
 * Class StudentService.
 */
class ClassroomService extends BaseService
{

    use WithFileUploads;
    /**
     * StudentService constructor.
     *
     * @param  ClassroomService  $classroomService;
     */
    public function __construct(Student $student)
    {
        $this->model = $student;
    }

}
