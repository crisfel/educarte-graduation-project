<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $name
 * @property string $address
 * @property string $city
 * @property string $country
 * @property bool $is_enable
 * @property string $icon_url
 * @property int $id
 */
class School extends Model
{
    use HasFactory;
    use Softdeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'address',
        'city',
        'country',
        'icon_url',
        'is_enable',
        'is_deleted',
    ];

    /**
     * @return HasOne
     */
    public function coordinator(): HasOne
    {
        return $this->hasOne(Coordinator::class);
    }

    public function teachers(): HasMany
    {
        return $this->hasMany(Teacher::class);
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

}

