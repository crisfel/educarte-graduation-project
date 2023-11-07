<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $school_id
 * @property mixed $classroom_id
 * @property mixed $user_id
 * @method static where(string $string, string $string1, $id)
 */
class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'school_id',
        'classroom_id'
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    { 
        return $this->belongsTo(User::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

}
