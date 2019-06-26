<?php

namespace App\Http\Controllers\Connections;

use App\Friendship;
use App\Http\Controllers\Controller;
use App\Notifications\FriendRequestAccepted;
use App\Notifications\NewFriendRequest;
use App\User;
use Illuminate\Support\Facades\Auth;

class ConnectionsController extends Controller
{
    public function check($id)
    {
        if (Auth::user()->is_friends_with($id) === 1) {
            return ["status" => "friends"];
        }

        if (Auth::user()->has_pending_friend_request_from($id)) {
            return ["status" => "pending"];
        }
        if (Auth::user()->has_pending_friend_request_sent_to($id)) {
            return ["status" => "waiting"];
        }
        return ["status" => 0];
    }

    public function connect($id)
    {
        $resp = Auth::user()->add_friend($id);

        User::find($id)->notify(new NewFriendRequest(Auth::user()));

        return $resp;
    }

    public function accept($id)
    {
        $resp = Auth::user()->accept_friend($id);
        User::find($id)->notify(new FriendRequestAccepted(Auth::user()));
        return $resp;
    }
    public function decline($id)
    {
        $resp = Auth::user()->decline_friend($id);
        // User::find($id)->notify(new FriendRequestAccepted(Auth::user()));
        return $resp;
    }

    public function pendingFriendRequest()
    {
        $pending = Auth::user()->pending_friend_requests();

        return $pending;
    }

    public function count_pending_request()
    {
        return Auth::user()->count_pending_request_from();
    }

    public function getFriends($userID)
    {
        $friends = array();

        $query = Friendship::where('user_requested', $userID)
            ->orWhere('requester', $userID)
            ->where('status', 1)->orderByRaw('RAND()')->take(10)
            ->get();
        foreach ($query as $friend):
            if ($friend->user_requested !== $userID) {
                $friends[] = $friend->user_requested;
            }

            if ($friend->requester !== $userID) {
                $friends[] = $friend->requester;
            }

        endforeach;

        return $friends;

    }

    

    public function getUser($userID)
    {
        return User::find($userID);

    }

    public function getFriendSuggestions()
    {
        //$friendsIDs = Auth::user()->friends_ids();
        $friends = $this->getFriends(auth()->id());
        // dd($friends);

        $suggestedFriends = [];

        foreach ($friends as $friendId) {
            # Friends friends list.
            $ff_list = $this->getFriends($friendId);

            foreach ($ff_list as $ffriendId) {
                # If the friendsFriend(ff) is not us, and not our friend, he can be suggested
                  if ($ffriendId != auth()->id() && !in_array($ffriendId, $friends)) {

                # The key is the suggested friend
                $suggestedFriends[$ffriendId] = ['mutual_friends' => []];
                $ff_friends = $this->getFriends($ffriendId);

              //  dd($ff_friends);

                foreach ($ff_friends as $ff_friendId) {
                    if (in_array($ff_friendId, $friends)) {
                        # If he is a friend of the current user, he is a mutual friend
                        $suggestedFriends[$ffriendId]['mutual_friends'][] = $ff_friendId;
                    }
                }

                  }

            }
        }
        # Convert the friend id's to user objects.
        $suggestedFriendObjs = array();
        if (!empty($suggestedFriends)) {
            foreach ($suggestedFriends as $suggestedFriend => $mutualFriends) {
                $suggestedFriendObj = new \stdClass();
                $suggestedFriendObj->suggestedUser = $this->getUser($suggestedFriend);

                if (!empty($mutualFriends)) {
                    $mutualFriendObjs = [];
                    foreach ($mutualFriends['mutual_friends'] as $mutualFriend) {
                        $mutualFriendObjs[] = $this->getUser($mutualFriend);
                    }
                }

                $suggestedFriendObj->mutualFriends = $mutualFriendObjs;
                $suggestedFriendObj->mutualFriendsCount = count($mutualFriendObjs);
                $suggestedFriendObjs[] = $suggestedFriendObj;
            }
        }

        return $suggestedFriendObjs;
    }
}
