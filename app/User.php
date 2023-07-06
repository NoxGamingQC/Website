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

    public static function getPicture($user) {
        if($user->AvatarURL && $user->minecraft_uuid) {
            if($user->avatar_preference == 'minecraft') {
                return 'https://crafthead.net/avatar/' . $user->minecraft_uuid;
            } else {
                return $user->AvatarURL;
            }
        }
        if($user->AvatarURL) {
            return $user->AvatarURL;
        } else if($user->minecraft_uuid) {
            return 'https://crafthead.net/avatar/' . $user->minecraft_uuid;
        } else {
            return '/img/no-avatar.jpg';
        }
    }

    public static function getMinecraftInfo($user) {
        if ($user->minecraft_uuid) {
            $json = file_get_contents('https://crafthead.net/profile/' . $user->minecraft_uuid);
            if (!empty($json)) {
                $data = json_decode($json, true);
                return [
                    'uuid' => $user->minecraft_uuid,
                    'shorten_uuid' => str_replace('-', '', $user->minecraft_uuid),
                    'name' => $data['name'],
                    'full_skin' => 'https://crafthead.net/armor/body/' . $user->minecraft_uuid,
                    'avatar' => 'https://crafthead.net/avatar/'. $user->minecraft_uuid,
                    'cape' => 'https://crafthead.net/cape/' . $user->minecraft_uuid,
                    'bust' => 'https://crafthead.net/bust/' . $user->minecraft_uuid,
                    'cube' => 'https://crafthead.net/cube/' . $user->minecraft_uuid,
                ];
            }
        }
        return null;
        
    }
}
