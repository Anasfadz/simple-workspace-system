<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Workspace;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Workspace $workspace) {
        $this->authorize('view', $workspace);
        return view('tasks.create', compact('workspace'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r, Workspace $workspace) {
        $this->authorize('view', $workspace);
        $data = $r->validate([
            'title' => ['required','string','max:150'],
            'description' => ['nullable','string'],
            'deadline' => ['required','date','after:now'],
        ]);
        $workspace->tasks()->create($data);
        return redirect()->route('workspaces.show',$workspace)->with('ok','Task created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Workspace $workspace, Task $task) {
        $this->authorize('view', $workspace);
        $this->authorize('update', $task);
        return view('tasks.edit', compact('workspace','task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, Workspace $workspace, Task $task) {
        $this->authorize('update', $task);
        $data = $r->validate([
            'title' => ['required','string','max:150'],
            'description' => ['nullable','string'],
            'deadline' => ['required','date'],
            'completed' => ['nullable','boolean'],
        ]);
    
        // toggle completed_at if checkbox present
        if ($r->boolean('completed')) {
            if (!$task->completed_at) $task->completed_at = now();
        } else {
            $task->completed_at = null;
        }
    
        $task->fill(collect($data)->except('completed')->toArray())->save();
        return redirect()->route('workspaces.show',$workspace)->with('ok','Task updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workspace $workspace, Task $task) {
        $this->authorize('delete', $task);
        $task->delete();
        return back()->with('ok','Task deleted');
    }
}
