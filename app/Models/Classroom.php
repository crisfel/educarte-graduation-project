<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed|string $name
 * @property mixed|string $code
 * @property int|mixed $user_id
 * @property mixed $school_id
 * @method static find($id)
 */
class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'user_id',
        'school_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function syllabus()
    {
        return $this->hasMany(Syllabus::class);
    }

}
