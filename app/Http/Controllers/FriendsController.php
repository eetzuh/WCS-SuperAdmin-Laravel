<?php

namespace App\Http\Controllers;

use App\Models\Friends;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Traits\friendsTrait;

class FriendsController extends Controller
{
    use friendsTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        $friends= $this->allFriends();
        return view('friends.index', ['friends'=>$friends]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Friends $friends)
    {
        $friends->user_id= auth()->user()->id;
        $friends->friend_id=$request->friendId;
        $friends->save();
        return redirect()->route('dashboard');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        DB::table('friends')->where([['user_id', $request->userId], ['friend_id', auth()->user()->id]])->update(['status'=> true]);
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function updateRequest(Request $request)
    {
        if($request->friendId){
            DB::table('friends')->where([['user_id', auth()->user()->id], ['friend_id', $request->friendId]])->delete();
        }else{
           DB::table('friends')->where([['user_id', $request->userId], ['friend_id', auth()->user()->id]])->delete();
        }
        return redirect()->route('dashboard');
    }

    public function removeFriend(Request $request, Friends $friends)
    {
        $friends->where([['user_id', $request->friendId], ['friend_id', auth()->user()->id]])
            ->orWhere([['friend_id', $request->friendId], ['user_id', auth()->user()->id]])->delete();
        return back();
    }

}
