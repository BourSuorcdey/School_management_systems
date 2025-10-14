<?php

namespace Database\Seeders;

use App\Domains\Classroom\Models\Classroom;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Classroom::create([
            "name"=> "IT class"
        ]);
        Classroom::create([
            "name"=> "IBM class"
        ]);
    }
}
