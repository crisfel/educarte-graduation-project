<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $classroom_id
 * @property mixed $project_id
 * @method static where(string $string, mixed $input)
 */
class Syllabus extends Model
{
    use HasFactory;

    protected $fillable = [
        'classroom_id',
        'project_id',
    ];

    public function classroom(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }

    public function project(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
