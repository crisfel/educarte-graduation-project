<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $name
 * @property mixed $description
 * @property mixed $is_enable
 * @property mixed $user_id
 * @property mixed $subcategory_id
 * @property mixed $id
 * @property mixed|string $icon_url
 * @property mixed $theme_type
 */
class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon_url',
        'description',
        'is_enable',
        'theme_type',
        'is_file',
        'user_id',
        'subcategory_id',
    ];

    public function subcategory(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
