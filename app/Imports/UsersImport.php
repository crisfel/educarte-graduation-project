<?php

namespace App\Imports;

use App\Models\Classroom;
use App\Models\Coordinator;
use App\Models\School;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class UsersImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        try {
            $currentUser = User::find(Auth::user()->id);
            if ($currentUser->role == 'Coordinator') {
                $school = $currentUser->coordinator->school;
            } else {
                $school = School::where('name', 'like', $row[5])->first();
            }
            if ($row[4] == 'Coordinator' || $row[4] == 'Teacher') {
                $user = User::where('email', 'like', $row[1])->first();
                if (isset($user)) {
                    $user->name = $row[0];
                    $user->email = $row[1];
                    $user->phone = $row[2];
                    $user->is_enable = intval($row[3]);
                    $user->save();
                } elseif (isset($school) && $currentUser->role == 'Administrator'
                    || $currentUser->role == 'Coordinator') {
                    $user = new User();
                    $user->name = $row[0];
                    $user->email = $row[1];
                    $user->phone = $row[2];
                    $user->is_enable = intval($row[3]);
                    $user->role = $row[4];
                    $user->password = Hash::make($row[2]);
                    $user->save();
                    if ($row[4] == 'Coordinator') {
                        $coordinator = new Coordinator();
                        $coordinator->user_id = $user->id;
                        $coordinator->school_id = $school->id;
                        $coordinator->save();
                        $user->assignRole('Coordinator');
                    }
                    if ($row[4] == 'Teacher') {
                        $teacher = new Teacher();
                        $teacher->user_id = $user->id;
                        $teacher->school_id = $school->id;
                        $teacher->save();
                        $user->assignRole('Teacher');
                    }
                }
            }
            if ($row[4] == 'Student') {
                $user = User::where('email', 'like', $row[1])->first();
                $classroom = Classroom::where('name', '=', $row[6])->first();
                if (isset($user)) {
                    $user->name = $row[0];
                    $user->email = $row[1];
                    $user->phone = $row[2];
                    $user->is_enable = intval($row[3]);
                    $user->save();
                } else {
                    if (isset($school)) {
                        $user = new User();
                        $user->name = $row[0];
                        $user->email = $row[1];
                        $user->phone = $row[2];
                        $user->is_enable = intval($row[3]);
                        $user->role = $row[4];
                        $user->password = Hash::make($row[2]);
                        $user->save();
                        $student = new Student();
                        $student->user_id = $user->id;
                        $student->school_id = $school->id;
                        if (isset($classroom)) {
                            $student->classroom_id = $classroom->id;
                        }
                        $student->save();
                        $user->assignRole('Student');
                    }
                }
            }
        } catch (Exception $e){
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}
