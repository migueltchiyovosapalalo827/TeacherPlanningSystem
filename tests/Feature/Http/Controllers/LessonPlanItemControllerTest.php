<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\LessonPlanItem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\LessonPlanItemController
 */
class LessonPlanItemControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $lessonPlanItems = LessonPlanItem::factory()->count(3)->create();

        $response = $this->get(route('lesson-plan-item.index'));

        $response->assertOk();
        $response->assertViewIs('lessonPlanItem.index');
        $response->assertViewHas('lessonPlanItems');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('lesson-plan-item.create'));

        $response->assertOk();
        $response->assertViewIs('lessonPlanItem.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\LessonPlanItemController::class,
            'store',
            \App\Http\Requests\LessonPlanItemStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $lesson_plan_id = $this->faker->numberBetween(-100000, 100000);
        $objective = $this->faker->word;
        $activity = $this->faker->word;
        $resources = $this->faker->word;
        $assessment = $this->faker->word;

        $response = $this->post(route('lesson-plan-item.store'), [
            'lesson_plan_id' => $lesson_plan_id,
            'objective' => $objective,
            'activity' => $activity,
            'resources' => $resources,
            'assessment' => $assessment,
        ]);

        $lessonPlanItems = LessonPlanItem::query()
            ->where('lesson_plan_id', $lesson_plan_id)
            ->where('objective', $objective)
            ->where('activity', $activity)
            ->where('resources', $resources)
            ->where('assessment', $assessment)
            ->get();
        $this->assertCount(1, $lessonPlanItems);
        $lessonPlanItem = $lessonPlanItems->first();

        $response->assertRedirect(route('lessonPlanItem.index'));
        $response->assertSessionHas('lessonPlanItem.id', $lessonPlanItem->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $lessonPlanItem = LessonPlanItem::factory()->create();

        $response = $this->get(route('lesson-plan-item.show', $lessonPlanItem));

        $response->assertOk();
        $response->assertViewIs('lessonPlanItem.show');
        $response->assertViewHas('lessonPlanItem');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $lessonPlanItem = LessonPlanItem::factory()->create();

        $response = $this->get(route('lesson-plan-item.edit', $lessonPlanItem));

        $response->assertOk();
        $response->assertViewIs('lessonPlanItem.edit');
        $response->assertViewHas('lessonPlanItem');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\LessonPlanItemController::class,
            'update',
            \App\Http\Requests\LessonPlanItemUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $lessonPlanItem = LessonPlanItem::factory()->create();
        $lesson_plan_id = $this->faker->numberBetween(-100000, 100000);
        $objective = $this->faker->word;
        $activity = $this->faker->word;
        $resources = $this->faker->word;
        $assessment = $this->faker->word;

        $response = $this->put(route('lesson-plan-item.update', $lessonPlanItem), [
            'lesson_plan_id' => $lesson_plan_id,
            'objective' => $objective,
            'activity' => $activity,
            'resources' => $resources,
            'assessment' => $assessment,
        ]);

        $lessonPlanItem->refresh();

        $response->assertRedirect(route('lessonPlanItem.index'));
        $response->assertSessionHas('lessonPlanItem.id', $lessonPlanItem->id);

        $this->assertEquals($lesson_plan_id, $lessonPlanItem->lesson_plan_id);
        $this->assertEquals($objective, $lessonPlanItem->objective);
        $this->assertEquals($activity, $lessonPlanItem->activity);
        $this->assertEquals($resources, $lessonPlanItem->resources);
        $this->assertEquals($assessment, $lessonPlanItem->assessment);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $lessonPlanItem = LessonPlanItem::factory()->create();

        $response = $this->delete(route('lesson-plan-item.destroy', $lessonPlanItem));

        $response->assertRedirect(route('lessonPlanItem.index'));

        $this->assertModelMissing($lessonPlanItem);
    }


    /**
     * @test
     */
    public function addResource_redirects(): void
    {
        $lessonPlanItem = LessonPlanItem::factory()->create();

        $response = $this->get(route('lesson-plan-item.addResource'));

        $response->assertRedirect(route('LessonPlanItem.index'));
    }
}
