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
        $tasks = collect([]);
        foreach ($tasksRaw as $task) {
            $tasks->push([
                'id' => $task->id,
                'name' => $task->name,
                'project' => $task->project->name,
                'status' => $task->status->name,
            ]);
        }
        return isset($groupBy) ?
            $tasks->groupBy($groupBy) : $tasks;
    }
}
