<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\LessonPlan;
use App\Models\LessonPlanItem;

class LessonPlanItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LessonPlanItem::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'lesson_plan_id' => LessonPlan::factory(),
            'objective' => $this->faker->word,
            'activity' => $this->faker->word,
            'resources' => $this->faker->word,
            'assessment' => $this->faker->word,
        ];
    }
}
