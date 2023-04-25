<?php

namespace App\Http\Controllers;

use App\Models\Friends;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
//    public $users;

    public function __construct(){
        $this->users=DB::table('users')->where('super_admin', false)->get();
    }

    public function index(Friends $friends)
    {
        if(auth()->user()->super_admin== false){
            $users= DB::table('users')->where([['super_admin', false],['id','!=', auth()->user()->id])->get();

        }else{
            $users = DB::table('users')->where('super_admin', false)->paginate(2);
        }
        return view('dashboard', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {

        return view('superadmin.create', ['user'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $input= $request->validated();
        $input['password']=bcrypt($input['password']);
        User::query()->create($input);

        return redirect('/dashboard');

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
    public function edit(User $user)
    {
        if($user->super_admin==true){
            abort(404);
        }
        return view('superadmin.edit', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $input=$request->validated();
        if($input['password']==null){
            unset($input['password']);
        }else{
            $input['password']=bcrypt($input['password']);
        }
        User::query()->where('id', $user->id)->update($input);

        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('dashboard', ['user'=>$user]);
    }

}
