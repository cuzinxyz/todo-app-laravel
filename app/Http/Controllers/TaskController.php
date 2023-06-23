<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Task;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
//dd($tasks);
        return view('todo', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        // dd($request->validated());
        Task::create($request->validated());
        return redirect()->route('homepage');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        try {
            if ($task) {
                $task->delete();
                return redirect()->route('homepage');
            }
            return back()->with('error', 'task list not found!');
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
