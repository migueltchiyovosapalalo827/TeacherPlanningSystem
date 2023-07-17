<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\StudentController
 */
class StudentControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $students = Student::factory()->count(3)->create();

        $response = $this->get(route('student.index'));

        $response->assertOk();
        $response->assertViewIs('student.index');
        $response->assertViewHas('students');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('student.create'));

        $response->assertOk();
        $response->assertViewIs('student.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StudentController::class,
            'store',
            \App\Http\Requests\StudentStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $name = $this->faker->name;
        $grade = $this->faker->numberBetween(-100000, 100000);

        $response = $this->post(route('student.store'), [
            'name' => $name,
            'grade' => $grade,
        ]);

        $students = Student::query()
            ->where('name', $name)
            ->where('grade', $grade)
            ->get();
        $this->assertCount(1, $students);
        $student = $students->first();

        $response->assertRedirect(route('student.index'));
        $response->assertSessionHas('student.id', $student->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $student = Student::factory()->create();

        $response = $this->get(route('student.show', $student));

        $response->assertOk();
        $response->assertViewIs('student.show');
        $response->assertViewHas('student');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $student = Student::factory()->create();

        $response = $this->get(route('student.edit', $student));

        $response->assertOk();
        $response->assertViewIs('student.edit');
        $response->assertViewHas('student');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\StudentController::class,
            'update',
            \App\Http\Requests\StudentUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $student = Student::factory()->create();
        $name = $this->faker->name;
        $grade = $this->faker->numberBetween(-100000, 100000);

        $response = $this->put(route('student.update', $student), [
            'name' => $name,
            'grade' => $grade,
        ]);

        $student->refresh();

        $response->assertRedirect(route('student.index'));
        $response->assertSessionHas('student.id', $student->id);

        $this->assertEquals($name, $student->name);
        $this->assertEquals($grade, $student->grade);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $student = Student::factory()->create();

        $response = $this->delete(route('student.destroy', $student));

        $response->assertRedirect(route('student.index'));

        $this->assertModelMissing($student);
    }
}
