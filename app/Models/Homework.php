<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $title
 * @property mixed $description
 * @property mixed $due_date
 * @property mixed $due_time
 * @property mixed $id
 * @property mixed $classroom_id
 * @property mixed $percent
 * @property mixed $requiredFile
 * @method static where(string $string, mixed $input)
 * @method static find(mixed $input)
 */
class Homework extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'percent',
        'requiredFile',
        'due_date',
        'due_time',
        'classroom_id',
    ];

    public function uploadedHomework(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Uploaded_homework::class);
    }
}
