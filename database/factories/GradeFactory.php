<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Grade;
use App\Models\LessonPlanItem;
use App\Models\Student;

class GradeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Grade::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'lesson_plan_item_id' => LessonPlanItem::factory(),
            'student_id' => Student::factory(),
            'grade' => $this->faker->text(30),
        ];
    }
}
