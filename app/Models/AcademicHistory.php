<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $user_id
 * @property mixed $classroom_id
 * @property float|int|mixed $totalScore
 */
class AcademicHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'classroom_id',
        'totalScore'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }



}
