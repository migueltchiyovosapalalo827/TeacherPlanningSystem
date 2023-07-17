<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Grade;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\GradeController
 */
class GradeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $grades = Grade::factory()->count(3)->create();

        $response = $this->get(route('grade.index'));

        $response->assertOk();
        $response->assertViewIs('grade.index');
        $response->assertViewHas('grades');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('grade.create'));

        $response->assertOk();
        $response->assertViewIs('grade.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\GradeController::class,
            'store',
            \App\Http\Requests\GradeStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $grade = $this->faker->text;

        $response = $this->post(route('grade.store'), [
            'grade' => $grade,
        ]);

        $grades = Grade::query()
            ->where('grade', $grade)
            ->get();
        $this->assertCount(1, $grades);
        $grade = $grades->first();

        $response->assertRedirect(route('grade.index'));
        $response->assertSessionHas('grade.id', $grade->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $grade = Grade::factory()->create();

        $response = $this->get(route('grade.show', $grade));

        $response->assertOk();
        $response->assertViewIs('grade.show');
        $response->assertViewHas('grade');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $grade = Grade::factory()->create();

        $response = $this->get(route('grade.edit', $grade));

        $response->assertOk();
        $response->assertViewIs('grade.edit');
        $response->assertViewHas('grade');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\GradeController::class,
            'update',
            \App\Http\Requests\GradeUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $grade = Grade::factory()->create();
        $grade = $this->faker->text;

        $response = $this->put(route('grade.update', $grade), [
            'grade' => $grade,
        ]);

        $grade->refresh();

        $response->assertRedirect(route('grade.index'));
        $response->assertSessionHas('grade.id', $grade->id);

        $this->assertEquals($grade, $grade->grade);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $grade = Grade::factory()->create();

        $response = $this->delete(route('grade.destroy', $grade));

        $response->assertRedirect(route('grade.index'));

        $this->assertModelMissing($grade);
    }
}
