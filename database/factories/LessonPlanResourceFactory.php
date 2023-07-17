<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\LessonPlanItem;
use App\Models\LessonPlanResource;
use App\Models\Resource;

class LessonPlanResourceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LessonPlanResource::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'lesson_plan_item_id' => LessonPlanItem::factory(),
            'resource_id' => Resource::factory(),
        ];
    }
}
