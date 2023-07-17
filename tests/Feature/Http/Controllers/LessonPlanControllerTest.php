<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\LessonPlan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\LessonPlanController
 */
class LessonPlanControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $lessonPlans = LessonPlan::factory()->count(3)->create();

        $response = $this->get(route('lesson-plan.index'));

        $response->assertOk();
        $response->assertViewIs('lessonPlan.index');
        $response->assertViewHas('lessonPlans');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('lesson-plan.create'));

        $response->assertOk();
        $response->assertViewIs('lessonPlan.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\LessonPlanController::class,
            'store',
            \App\Http\Requests\LessonPlanStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $user_id = $this->faker->numberBetween(-100000, 100000);
        $title = $this->faker->sentence(4);
        $description = $this->faker->text;
        $curriculum_standard = $this->faker->text;

        $response = $this->post(route('lesson-plan.store'), [
            'user_id' => $user_id,
            'title' => $title,
            'description' => $description,
            'curriculum_standard' => $curriculum_standard,
        ]);

        $lessonPlans = LessonPlan::query()
            ->where('user_id', $user_id)
            ->where('title', $title)
            ->where('description', $description)
            ->where('curriculum_standard', $curriculum_standard)
            ->get();
        $this->assertCount(1, $lessonPlans);
        $lessonPlan = $lessonPlans->first();

        $response->assertRedirect(route('lessonPlan.index'));
        $response->assertSessionHas('lessonPlan.id', $lessonPlan->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $lessonPlan = LessonPlan::factory()->create();

        $response = $this->get(route('lesson-plan.show', $lessonPlan));

        $response->assertOk();
        $response->assertViewIs('lessonPlan.show');
        $response->assertViewHas('lessonPlan');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $lessonPlan = LessonPlan::factory()->create();

        $response = $this->get(route('lesson-plan.edit', $lessonPlan));

        $response->assertOk();
        $response->assertViewIs('lessonPlan.edit');
        $response->assertViewHas('lessonPlan');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\LessonPlanController::class,
            'update',
            \App\Http\Requests\LessonPlanUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $lessonPlan = LessonPlan::factory()->create();
        $user_id = $this->faker->numberBetween(-100000, 100000);
        $title = $this->faker->sentence(4);
        $description = $this->faker->text;
        $curriculum_standard = $this->faker->text;

        $response = $this->put(route('lesson-plan.update', $lessonPlan), [
            'user_id' => $user_id,
            'title' => $title,
            'description' => $description,
            'curriculum_standard' => $curriculum_standard,
        ]);

        $lessonPlan->refresh();

        $response->assertRedirect(route('lessonPlan.index'));
        $response->assertSessionHas('lessonPlan.id', $lessonPlan->id);

        $this->assertEquals($user_id, $lessonPlan->user_id);
        $this->assertEquals($title, $lessonPlan->title);
        $this->assertEquals($description, $lessonPlan->description);
        $this->assertEquals($curriculum_standard, $lessonPlan->curriculum_standard);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $lessonPlan = LessonPlan::factory()->create();

        $response = $this->delete(route('lesson-plan.destroy', $lessonPlan));

        $response->assertRedirect(route('lessonPlan.index'));

        $this->assertModelMissing($lessonPlan);
    }
}
