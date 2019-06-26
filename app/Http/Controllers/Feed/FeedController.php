<?php

namespace App\Http\Controllers\Feed;

use App\Friendship;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Post;

class FeedController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;

        $media = User::find($user);

        $connectionCount = count($this->countConnections(auth()->id()));
        $postCount = Post::where('user_id', auth()->id())->count();
        

        if ($media->imageUrl != null) {
            $profile = $media->getMedia('images')->first()->getUrl('thumb');

        }
        return view('feed.index', compact('profile', 'connectionCount','postCount'));

    }

    private function countConnections($userID)
    {
        $friends = array();

        $query = Friendship::where('user_requested', $userID)
            ->orWhere('requester', $userID)
            ->where('status', 1)
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
}
