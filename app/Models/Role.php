<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public static function getAdmins()
    {
        $users = User::all();
        $admins = [];
        foreach($users as $user)
        {
            if($user->role->name == "Administrateur")
            {
                array_push($admins,$user);
            }
        }
        return $admins;
    }
}
