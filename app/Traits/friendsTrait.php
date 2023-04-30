<?php
namespace App\Traits;

trait friendsTrait
{
    public function allFriends(){
        $friends1=auth()->user()->friendsFromAccepted;
        $friends=auth()->user()->friendsWithAccepted->merge($friends1)->sort();
        return ($friends);
    }

}
