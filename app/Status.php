<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';

    protected $fillable = [
        'name',
    ];

    public function tasks()
    {
        return $this->hasMany(Tasks::class, 'status_id', 'id');
    }
}
