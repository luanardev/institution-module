<?php

namespace Luanardev\Modules\Institution\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Luanardev\Modules\Institution\Http\Requests\SectionRequest;
use Luanardev\Modules\Institution\Entities\Section;


class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $this->authorize('view_section');

        return view('institution::section.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $this->authorize('create_section');

        return view('institution::section.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param SectionRequest $request
     * @return Renderable
     */
    public function store(SectionRequest $request)
    {
        $this->authorize('create_section');

        Section::create($request->all());
        return redirect()->route('section.index')->with('success', 'Record created successfully');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $this->authorize('view_section');

        return redirect()->route('section.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $this->authorize('update_section');

        $section = Section::findorfail($id);
        return view('institution::section.edit')->with([
            'section' => $section
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param SectionRequest $request
     * @param int $id
     * @return Renderable
     */
    public function update(SectionRequest $request, $id)
    {
        $this->authorize('update_section');

        $section = Section::findorfail($id);
        $section->update($request->all());
        return redirect()->route('section.index')->with('success', 'Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->authorize('delete_section');

        Section::destroy($id);
        return redirect()->route('section.index')->with('success', 'Record deleted successfully');
    }

    /**
     * Remove selected resources from storage
     * @param Request $request
     * @return Rendarable
     */
    public function deleteAll(Request $request)
    {
        $this->authorize('delete_section');

        $items = $request->items;
        Section::whereIn('id',explode(",",$items))->delete();
        if($request->ajax()){
            return response()->json(['success'=>"Records Deleted successfully."]);
        }else{
            return redirect()->route('section.index')->with('success', 'Records deleted successfully');
        }

    }
}
