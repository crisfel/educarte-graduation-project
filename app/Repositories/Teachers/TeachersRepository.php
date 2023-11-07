<?php

namespace App\Repositories\Teachers;


use App\Models\Teacher;
use App\Models\User;
use App\Repositories\Contracts\Teachers\TeachersRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class TeachersRepository implements TeachersRepositoryInterface
{
    public function saveTeacher(User $user) : bool
    {
        $coordinator = User::find(Auth::user()->id);
        $user->save();
        $teacher = new Teacher();
        $teacher->school_id = $coordinator->coordinator->school_id;
        $teacher->user_id = $user->id;
        $teacher->save();
        $user->assignRole('Teacher');
        return true;
    }

    public function changeStatus(int $id, int $status): bool
    {
        $user = User::find($id);
        $user->is_enable = $status;
        $user->save();
        return true;
    }

    public function updateTeacher(string $name, string $email, string $phone, $password, int $user_id): bool
    {
        $coordinator = User::find(Auth::user()->id);
        $user = User::find($user_id);
        $user->name = $name;
        $user->email= $email;
        $user->phone = $phone;
        $user->teacher->school_id = $coordinator->coordinator->school_id;
        if(!is_null($password)) {
            $user->password = bcrypt($password);
        }
        $user->save();
        /*
        $teacher = Teacher::where('user_id','=',$user->id)->first();
        $teacher->school_id = $coordinator->coordinator->school_id;
        $teacher->save();
        */
        return true;
    }

    public function deleteTeacher(int $user_id): bool
    {
        $user = User::find($user_id);
        $user->delete();

        return true;
    }
}
