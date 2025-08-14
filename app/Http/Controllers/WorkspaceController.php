<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class WorkspaceController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $workspaces = auth()->user()->workspaces()->latest()->paginate(10);
        return view('workspaces.index', compact('workspaces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    { 
        return view('workspaces.create'); 
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r) {
        $data = $r->validate(['name' => ['required','string','max:100']]);
        $workspace = auth()->user()->workspaces()->create($data);
        return redirect()->route('workspaces.show',$workspace)->with('ok','Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Workspace $workspace) {
        $this->authorize('view', $workspace);
        $tasks = $workspace->tasks()->latest()->paginate(10);
        return view('workspaces.show', compact('workspace','tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Workspace $workspace) {
        $this->authorize('update', $workspace);
        return view('workspaces.edit', compact('workspace'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, Workspace $workspace) {
        $this->authorize('update', $workspace);
        $data = $r->validate(['name' => ['required','string','max:100']]);
        $workspace->update($data);
        return redirect ('/workspaces')->with('ok','Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workspace $workspace) {
        $this->authorize('delete', $workspace);
        $workspace->delete();
        return redirect()->route('workspaces.index')->with('ok','Deleted');
    }
}
