<?php

namespace App\Models;

use AddForeignKeysToOpinionstatetransitionsTable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pseudo',
        'first_name',
        'last_name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // ============= Relationships

    public function opinions()
    {
        return $this->hasMany(Opinion::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public static function setAdmin($userPseudo)
    {

        foreach(User::all() as $user) 
        {
            if($user->pseudo == $userPseudo)
            {
                $selectedUser = $user;
                break;    
            }
        }   
         
        $roles = Role::all();
        foreach($roles as $role)
        {
            if($role->name == "Administrateur")
            {
                $selectedUser->role_id = $role->id;
                break;
            }
        }    
        $selectedUser->save();
        return view ('roles.index')->with(compact("users","admins"));
    }
}
