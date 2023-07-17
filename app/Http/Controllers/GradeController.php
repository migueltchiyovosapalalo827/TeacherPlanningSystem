<?php

namespace App\Http\Controllers;

use App\Http\Requests\GradeStoreRequest;
use App\Http\Requests\GradeUpdateRequest;
use App\Models\Grade;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GradeController extends Controller
{
    public function index(Request $request): View
    {
        $grades = Grade::all();

        return view('grade.index', compact('grades'));
    }

    public function create(Request $request): View
    {
        return view('grade.create');
    }

    public function store(GradeStoreRequest $request): RedirectResponse
    {
        $grade = Grade::create($request->validated());

        $request->session()->flash('grade.id', $grade->id);

        return redirect()->route('grade.index');
    }

    public function show(Request $request, Grade $grade): View
    {
        return view('grade.show', compact('grade'));
    }

    public function edit(Request $request, Grade $grade): View
    {
        return view('grade.edit', compact('grade'));
    }

    public function update(GradeUpdateRequest $request, Grade $grade): RedirectResponse
    {
        $grade->update($request->validated());

        $request->session()->flash('grade.id', $grade->id);

        return redirect()->route('grade.index');
    }

    public function destroy(Request $request, Grade $grade): RedirectResponse
    {
        $grade->delete();

        return redirect()->route('grade.index');
    }
}
