<?php

namespace App\Http\Controllers\NoxBOT;

use Auth;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\NoxBOT\RolesReactions;

class BotRolesReactionsController extends Controller
{
    public function getRolesReactions()
    {
        $rolesReactions = [];
        foreach (RolesReactions::orderBy('ID')->get() as $key => $roleReaction) {
            array_push($rolesReactions, [
                'serverID' => $roleReaction->ServerID,
                'channelID' => $roleReaction->ChannelID,
                'messageID' => $roleReaction->MessageID,
                'roleID' => $roleReaction->RoleID,
                'emoji' => $roleReaction->Emoji
            ]);
        }
        return response()->json($rolesReactions);
    }
}
