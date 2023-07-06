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

    public static function getSocialsLinks($user) {
        return [
            'github' =>  $user->github ? 'https://github.com/' . $user->github : '',
            'instagram' => $user->instagram ? 'https://instagram.com/' . $user->instagram : '',
            'reddit' => $user->reddit ? 'https://reddit.com/user/' . $user->reddit : '',
            'snapchat' => $user->snapchat ? 'https://snapchat.com/add/' . $user->snapchat : '',
            'spotify' => $user->spotify ? 'https://open.spotify.com/' . $user->spotify : '',
            'steam' => $user->steam ? 'https://steamcommunity.com/' . $user->steam : '',
            'tiktok' => $user->tiktok ? 'https://tiktok.com/@' . $user->tiktok : '',
            'twitch' => $user->twitch ? 'https://twitch.tv/' . $user->twitch : '',
            'twitter' => $user->twitter ? 'https://twitter.com/' . $user->twitter : '',
            'youtube' => $user->github ? 'https://youtube.com/' . $user->github : '',
        ];
    }
}
