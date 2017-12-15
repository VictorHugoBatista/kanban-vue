<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $groupBy = $request->get('group_by');
        $tasksRaw = Task::all();
        $tasks = collect([]);
        foreach ($tasksRaw as $task) {
            $tasks->push([
                'id' => $task->id,
                'name' => $task->name,
                'project' => $task->project->name,
                'status' => $task->status->name,
            ]);
        }
        return response()->json(
            (isset($groupBy)) ?
                $tasks->groupBy($groupBy) :
                $tasks,
            200
        );
    }
}
