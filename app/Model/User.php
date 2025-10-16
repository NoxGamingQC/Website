<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Model\DiscordServerConfig;
use App\Model\DiscordUsers;
use Laravel\Cashier\Billable;


class User extends Authenticatable
{
    use Billable;
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

    public static function getPicture($user) {
        if($user->avatar_url && $user->minecraft_uuid) {
            if($user->avatar_preference == 'minecraft') {
                return 'https://crafthead.net/avatar/' . $user->minecraft_uuid;
            } else {
                return $user->avatar_url;
            }
        }
        if($user->avatar_url) {
            return $user->avatar_url;
        } else if($user->minecraft_uuid) {
            return 'https://crafthead.net/avatar/' . $user->minecraft_uuid;
        } else {
            return '/img/no-avatar.jpg';
        }
    }

    public static function getDiscordInfo($user) {
        if($user->discord_id) {
            return DiscordUsers::getUserById($user->discord_id);
        }
        return null;
    }

    public static function getMinecraftInfo($user) {
        if ($user->minecraft_uuid) {
            $json = @file_get_contents('https://crafthead.net/profile/' . $user->minecraft_uuid);
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

    public function scopeAvatar() {
        if($this->avatar_preference == 'minecraft') {
            $minecraft = User::getMinecraftInfo($this);
            if(!empty($minecraft['avatar'])) {
                return $minecraft['avatar'];
            }
        } else if($this->avatar_preference == 'xbox') {
            if($this->xbox_gamertag) {
                try {
                    $xboxProfile = json_decode(file_get_contents((env('APP_PROD_URL') ? env('APP_PROD_URL') : env('APP_URL')) . '/api/xbox/'. $this->xbox_gamertag));
                } catch (\Exception $exception) {
                    $xboxProfile = null;
                }
                if(!empty($xboxProfile)) {
                    if($xboxProfile->data->avatar) {
                        return $xboxProfile->data->avatar;
                    }
                }
            }   
        }
         return $this->avatar_url ? $this->avatar_url : '/img/no-avatar.jpg';
    }

    public function scopeHasDiscordServer() {
        $discordUser = DiscordUsers::find($this->discord_id);
        if($discordUser) {
            return count(DiscordServerConfig::where('owner_id', '=', $discordUser->discord_id)->get()) ? true : false;
        }
        return false;
    }

    public function scopeHasPermission($user, $slug) {
        if(!is_null($this->permission)) {
            $permissions = explode(';', $this->permission);
            return in_array($slug, $permissions);
        }
        return false;
    }
}
