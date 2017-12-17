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
        return response()->json(Task::getGrouped($groupBy),200);
    }

    public function update(Request $request, Task $task)
    {
        $status_id = (int) $request->get('status_id', 0);
        if (0 < $status_id) {
            $task->update([
                'status_id' => $status_id
            ]);
        }
        return response()->json(
            Task::getFormatedData($task),
            (0 < $status_id) ? 200 : 400
        );
    }
}
