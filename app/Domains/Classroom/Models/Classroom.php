<?php

namespace App\Domains\Classroom\Models;

use App\Domains\Student\Models\Student;
use App\Domains\Teacher\Models\Teacher;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Student.
 */
class Classroom extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        "name"
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

    public function students(){
        return $this->belongsToMany(Student::class, 'class_has_students');
    }

    public function teachers(){
        return $this->belongsToMany(Teacher::class,'class_has_teachers');
    }
}
