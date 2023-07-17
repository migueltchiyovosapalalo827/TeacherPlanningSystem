<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Grade;
use App\Models\LessonPlan;
use App\Models\LessonPlanItem;
use App\Models\LessonPlanResource;
use App\Models\Resource;
use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        LessonPlan::factory(10)->create();
        LessonPlanItem::factory(10)->create();
        Resource::factory(10)->create();
        LessonPlanResource::factory(10)->create();
        Student::factory(10)->create();
        Grade::factory(10)->create();
    }
}
