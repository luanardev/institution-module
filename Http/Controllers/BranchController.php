<?php

namespace Luanardev\Modules\Institution\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Luanardev\Modules\Institution\Http\Requests\BranchRequest;
use Luanardev\Modules\Institution\Entities\Branch;

class BranchController extends Controller
{


    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $this->authorize('view_branch');

        return view('institution::branch.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $this->authorize('create_branch');

        return view('institution::branch.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param BranchRequest $request
     * @return Renderable
     */
    public function store(BranchRequest $request)
    {
        $this->authorize('create_branch');

        Branch::create($request->all());
        return redirect()->route('branch.index')->with('success', 'Record created successfully');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $this->authorize('view_branch');

        return redirect()->route('branch.edit', $id);
    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $this->authorize('update_branch');

        $branch = Branch::findorfail($id);
        return view('institution::branch.edit')->with([
            'branch' => $branch
        ]);
    }


    /**
     * Update the specified resource in storage.
     * @param BranchRequest $request
     * @param int $id
     * @return Renderable
     */
    public function update(BranchRequest $request, $id)
    {
        $this->authorize('update_branch');
        
        $branch = Branch::findorfail($id);
        $branch->update($request->all());
        return redirect()->route('branch.index')->with('success', 'Record updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->authorize('delete_branch');

        Branch::destroy($id);
        return redirect()->route('branch.index')->with('success', 'Record deleted successfully');
    }

    /**
     * Remove selected resources from storage
     * @param Request $request
     * @return Rendarable
     */
    public function deleteAll(Request $request)
    {
        $this->authorize('delete_branch');

        $items = $request->items;
        Branch::whereIn('id',explode(",",$items))->delete();
        if($request->ajax()){
            return response()->json(['success'=>"Records Deleted successfully."]);
        }else{
            return redirect()->route('branch.index')->with('success', 'Records deleted successfully');
        }

    }


}
