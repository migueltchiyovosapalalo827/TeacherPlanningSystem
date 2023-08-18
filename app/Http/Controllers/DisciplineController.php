<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use App\Http\Requests\StoreDisciplineRequest;
use App\Http\Requests\UpdateDisciplineRequest;

class DisciplineController extends Controller
{
       /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->authorizeResource(Discipline::class, 'discipline');
    }
    public function index()
    {
        $disciplines = Discipline::all();
        return view('disciplines.index', compact('disciplines'));
    }

    public function create()
    {
        return view('disciplines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDisciplineRequest $request)
    {
        $data = $request->validated();

        $discipline = Discipline::create($data);

        return redirect()->route('disciplines.index')->with('success', 'Disciplina cadastrada com sucesso.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Discipline $discipline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discipline $discipline)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDisciplineRequest $request, Discipline $discipline)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discipline $discipline)
    {
        //
    }
}
