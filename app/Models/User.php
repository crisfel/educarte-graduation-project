<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property mixed|string $email
 * @property mixed|string $name
 * @property mixed|string $phone
 * @property bool|mixed $is_enable
 * @property mixed|string $role
 * @property mixed|string $password
 * @property mixed $id
 * @method static find(int $id)
 * @method static where(string $string, string $string1, string $string2)
 * @method static findOrFail($id)
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;
    use Softdeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'is_enable',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @var mixed|string
     */


    public function coordinator(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Coordinator::class);
    }

    public function teacher(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Teacher::class);
    }

    public function classroom(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Classroom::class);
    }

    public function student(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Student::class);
    }

    public function uploadedHomework(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Uploaded_homework::class);
    }
    /*
    public function academicHistories()
    {
        return $this->hasMany(AcademicHistory::class);
    }
    */

}
