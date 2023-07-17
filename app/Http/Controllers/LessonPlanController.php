<?php

namespace App\Http\Controllers;

use App\Http\Requests\LessonPlanStoreRequest;
use App\Http\Requests\LessonPlanUpdateRequest;
use App\Models\LessonPlan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LessonPlanController extends Controller
{
    public function index(Request $request): View
    {
        $lessonPlans = LessonPlan::all();

        return view('lessonPlan.index', compact('lessonPlans'));
    }

    public function create(Request $request): View
    {
        return view('lessonPlan.create');
    }

    public function store(LessonPlanStoreRequest $request): RedirectResponse
    {
        $lessonPlan = LessonPlan::create($request->validated());

        //$request->session()->flash('lessonPlan.id', $lessonPlan->id);

        return redirect()->route('lesson-plan.index');
    }

    public function show(Request $request, LessonPlan $lessonPlan): View
    {
        return view('lessonPlan.show', compact('lessonPlan'));
    }

    public function edit(Request $request, LessonPlan $lessonPlan): View
    {
        return view('lessonPlan.edit', compact('lessonPlan'));
    }

    public function update(LessonPlanUpdateRequest $request, LessonPlan $lessonPlan): RedirectResponse
    {
        $lessonPlan->update($request->validated());

       // $request->session()->flash('lessonPlan.id', $lessonPlan->id);

        return redirect()->route('lesson-plan.index');
    }

    public function destroy(Request $request, LessonPlan $lessonPlan): RedirectResponse
    {
        $lessonPlan->delete();

        return redirect()->route('lesson-plan.index');
    }
}
