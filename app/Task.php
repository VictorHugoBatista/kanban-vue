<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'project_id',
        'status_id',
    ];

    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }

    public function project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }

    public static function getGrouped($groupBy = null)
    {
        $tasksRaw = self::all();
        $tasks = [];
        foreach ($tasksRaw as $task) {
            switch ($groupBy) {
                case 'status':
                    $tasks[$task->status_id]['status_name'] =
                        $task->status->name;
                    $tasks[$task->status_id]['tasks'][] =
                        self::getFormatedData($task);
                    break;
                case 'project':
                    $tasks[$task->project_id]['project_name'] =
                        $task->project->name;
                    $tasks[$task->project_id]['tasks'][] =
                        self::getFormatedData($task);
                    break;
                default:
                    $tasks[] = $task;
            }
        }
        return $tasks;
    }

    public static function getFormatedData(Task $task)
    {
       return [
            'id' => $task->id,
            'name' => $task->name,
            'project' => $task->project->name,
            'status' => $task->status->name,
        ];
    }
}
