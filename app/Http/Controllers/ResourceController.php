<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResourceStoreRequest;
use App\Http\Requests\ResourceUpdateRequest;
use App\Models\Resource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ResourceController extends Controller
{
    public function index(Request $request): View
    {
        $resources = Resource::all();

        return view('resource.index', compact('resources'));
    }

    public function create(Request $request): View
    {
        return view('resource.create');
    }

    public function store(ResourceStoreRequest $request): RedirectResponse
    {
        $resource = Resource::create($request->validated());

        $request->session()->flash('resource.id', $resource->id);

        return redirect()->route('resource.index');
    }

    public function show(Request $request, Resource $resource): View
    {
        return view('resource.show', compact('resource'));
    }

    public function edit(Request $request, Resource $resource): View
    {
        return view('resource.edit', compact('resource'));
    }

    public function update(ResourceUpdateRequest $request, Resource $resource): RedirectResponse
    {
        $resource->update($request->validated());

        $request->session()->flash('resource.id', $resource->id);

        return redirect()->route('resource.index');
    }

    public function destroy(Request $request, Resource $resource): RedirectResponse
    {
        $resource->delete();

        return redirect()->route('resource.index');
    }
}
