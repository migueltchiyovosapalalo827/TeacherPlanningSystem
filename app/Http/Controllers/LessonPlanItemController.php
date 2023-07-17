<?php

namespace App\Http\Controllers;

use App\Http\Requests\LessonPlanItemStoreRequest;
use App\Http\Requests\LessonPlanItemUpdateRequest;
use App\Models\LessonPlanItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LessonPlanItemController extends Controller
{
    public function index(Request $request): View
    {
        $lessonPlanItems = LessonPlanItem::all();

        return view('lessonPlanItem.index', compact('lessonPlanItems'));
    }

    public function create(Request $request): View
    {
        return view('lessonPlanItem.create');
    }

    public function store(LessonPlanItemStoreRequest $request): RedirectResponse
    {
        $lessonPlanItem = LessonPlanItem::create($request->validated());

        // $request->session()->flash('lessonPlanItem.id', $lessonPlanItem->id);

        return redirect()->route('lesson-plan.show', $lessonPlanItem->lesson_plan_id);
    }

    public function show(Request $request, LessonPlanItem $lessonPlanItem): View
    {
        return view('lessonPlanItem.show', compact('lessonPlanItem'));
    }

    public function edit(Request $request, LessonPlanItem $lessonPlanItem): View
    {
        return view('lessonPlanItem.edit', compact('lessonPlanItem'));
    }

    public function update(LessonPlanItemUpdateRequest $request, LessonPlanItem $lessonPlanItem): RedirectResponse
    {
        $lessonPlanItem->update($request->validated());

        // $request->session()->flash('lessonPlanItem.id', $lessonPlanItem->id);

        return redirect()->route('lesson-plan.index');
    }

    public function destroy(Request $request, LessonPlanItem $lessonPlanItem): RedirectResponse
    {
        $lesson_plan_id = $lessonPlanItem->lesson_plan_id;
        $lessonPlanItem->delete();

        return redirect()->route('lesson-plan.show', $lesson_plan_id);
    }

    public function addResource(Request $request, $id): RedirectResponse
    {
        $lessonPlanItem = LessonPlanItem::find($id);
        $lessonPlanItem->resources()->synck($request->resource_ids);

        return redirect()->route('LessonPlanItem.index');
    }
}
