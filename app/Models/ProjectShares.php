<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectShares extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id', 'available_shares',
    ];

    public function projects() {
        return $this->belongsTo(Project::class);
    }
}
