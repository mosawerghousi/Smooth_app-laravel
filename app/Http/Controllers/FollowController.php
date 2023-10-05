<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function createFollow(User $user) {
        //you can not follow your self
        if($user->id == auth()->user()->id) {
            return back()->with('failure', 'Invalid Follow');
        } 
        //you can not follow a user 2 times
        $existCheck = Follow::where([['user_id', '=', auth()->user()->id],['followeduser', '=', $user->id]])->count();

        if ($existCheck) {
            return back()->with('failure', 'You have followed this user');
        }

        $newFollow = new Follow;
        $newFollow->user_id = auth()->user()->id;
        $newFollow->followeduser = $user->id;
        $newFollow->save();

        return back()->with('success', 'User Followed Successfully');
    }

    public function removeFollow(User $user) {
        Follow::where([['user_id', '=', auth()->user()->id],['followeduser', '=', $user->id]])->delete();     
       return back()->with('success', 'User Successfully Unfollowed !');
    }
}
