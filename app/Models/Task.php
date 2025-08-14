<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'workspace_id',
        'title',
        'description',
        'deadline',
        'completed_at'
    ];

    protected $casts = [
        'deadline' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function workspace() 
    { 
        return $this->belongsTo(Workspace::class); 
    }

    public function isCompleted()
    {
        return (bool) $this->is_completed;
    }

    public function humanRemaining(): string {
        return now()->diffForHumans($this->deadline, [
            'parts' => 3, // up to 3 units
            'syntax' => Carbon::DIFF_ABSOLUTE
        ]).' remaining';
    }

    public function humanCompletedAgo(): string {
        return optional($this->completed_at)?->diffForHumans() ?? '';
    }
}
