<?php

namespace App\Policies;

use App\Models\User;
use Flags\Flags;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class PagePolicy
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */

    public static function userCan($page)
    {   
        $user =Auth::user();
        if(isset($user->$page)!=true)
        {
              //echo '<script>history.back()</script>'; exit;
             echo '<script>window.location.href="'.route('list-news').'"</script>';
        }
        if(intval($user->$page)===0)
        {
              //echo '<script>history.back()</script>'; exit;
             echo '<script>window.location.href="'.route('list-news').'"</script>';
        }


    }


}
