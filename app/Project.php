<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
    ];

    public function tasks()
    {
        return $this->hasMany(Tasks::class, 'project_id', 'id');
    }
}
