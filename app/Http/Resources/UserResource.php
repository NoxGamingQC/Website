<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        $username = $this->resource;
        $user = User::where('name', '=', $username)->first();
        if($user) {
            return [
                'id' => $user->id,
                'username' => $user->name,
                'firstname' => $user->isFirstnameShowned ? $user->Firstname : null,
                'lastname' => $user->isLastnameShowned ? $user->Lastname : null,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
            ];
        } else {
            $users = User::all();
            foreach($users as $user) {
                if(strtolower($user->name) == strtolower($this->resource)) {
                    return [
                        'id' => $user->id,
                        'username' => $user->name,
                        'firstname' => $user->isFirstnameShowned ? $user->Firstname : null,
                        'lastname' => $user->isLastnameShowned ? $user->Lastname : null,
                        'created_at' => $user->created_at,
                        'updated_at' => $user->updated_at,
                    ];
                }
            }
        }
        abort(404, 'User not found');
    }
}
