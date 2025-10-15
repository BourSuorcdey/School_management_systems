<?php

namespace App\Domains\Student\Models;

use App\Domains\Classroom\Models\Classroom;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Student.
 */
class Student extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        "name",
        "age",
        "gender",
        "email",
        "image",
    ];

    /**
     * @var string[]
     */
    protected $dates = [
        'starts_at',
        'ends_at',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'enabled' => 'boolean',
    ];

    const MALE = 'male';
    const FEMALE = 'female';

    public function classrooms(){
        return $this->belongsToMany(Classroom::class, 'class_has_students')
                    ->withPivot(['teacher_id', 'start_time', 'end_time']);
    }
}
