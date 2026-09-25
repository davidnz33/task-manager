<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // Fields we're allowed to fill in one go (security against mass assignment)
    protected $fillable = ['task_name', 'description', 'status', 'due_date'];

    // Makes due_date become a Carbon date so we can format it
    protected $casts = [
        'due_date' => 'date',
    ];
}