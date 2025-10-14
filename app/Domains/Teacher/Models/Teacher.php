<?php

namespace App\Domains\Teacher\Models;

use App\Domains\Classroom\Models\Classroom;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Teacher.
 */
class Teacher extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        "name",
        "age",
        "gender",
        "phone_number",
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
        return $this->belongsToMany(Classroom::class, 'class_has_teachers');
    }
}
