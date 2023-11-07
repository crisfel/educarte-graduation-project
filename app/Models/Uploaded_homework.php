<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed|null $path
 * @property mixed $score
 * @property mixed $homework_id
 * @property mixed $user_id
 * @method static where(string $string, string $string1, $id)
 * @method static find($id)
 */
class Uploaded_homework extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'score',
        'status',
        'delivery_at',
        'homework_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function homework()
    {
        return $this->belongsTo(Homework::class);
    }



}
