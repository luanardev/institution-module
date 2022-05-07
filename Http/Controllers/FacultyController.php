<?php

namespace Luanardev\Modules\Institution\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Luanardev\Modules\Institution\Http\Requests\FacultyRequest;
use Luanardev\Modules\Institution\Entities\Faculty;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $this->authorize('view_faculty');

        return view('institution::faculty.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $this->authorize('create_faculty');

        return view('institution::faculty.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param FacultyRequest $request
     * @return Renderable
     */
    public function store(FacultyRequest $request)
    {
        $this->authorize('create_faculty');

        Faculty::create($request->all());
        return redirect()->route('faculty.index')->with('success', 'Record created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $this->authorize('view_faculty');

        return redirect()->route('faculty.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $this->authorize('update_faculty');

        $faculty = Faculty::findorfail($id);
        return view('institution::faculty.edit')->with([
            'faculty' => $faculty
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param FacultyRequest $request
     * @param int $id
     * @return Renderable
     */
    public function update(FacultyRequest $request, $id)
    {
        $this->authorize('update_faculty');

        $faculty = Faculty::findorfail($id);
        $faculty->update($request->all());
        return redirect()->route('faculty.index')->with('success', 'Record updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->authorize('delete_faculty');

        Faculty::destroy($id);
        return redirect()->route('faculty.index')->with('success', 'Record deleted successfully');
    }

     /**
     * Remove selected resources from storage
     * @param Request $request
     * @return Rendarable
     */
    public function deleteAll(Request $request)
    {
        $this->authorize('delete_faculty');

        $items = $request->items;
        Faculty::whereIn('id',explode(",",$items))->delete();
        if($request->ajax()){
            return response()->json(['success'=>"Records Deleted successfully."]);
        }else{
            return redirect()->route('faculty.index')->with('success', 'Records deleted successfully');
        }

    }
}
