<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'users';

    public function isDev()
    {
        $this->isDev;
    }

    public function isModerator()
    {
        $this->isModerator;
    }

    public function isAdmin()
    {
        $this->isAdmin;
    }

    public static function isMailExist($email) 
    {
        $isExist = false;
        foreach(User::all() as $key => $user) {
            $emailList = explode(';', $user->local_mail);
            if(count($emailList) > 1) {
                foreach($emailList as $key => $emailAdress) {
                    if($emailAdress == $email) {
                        $isExist = true;
                    }
                }
            }
            if($email == $user->local_mail) {
                $isExist = true;
            }
        }
        return $isExist;
    }
}
