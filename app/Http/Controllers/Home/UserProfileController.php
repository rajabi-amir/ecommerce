<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {
       $comments= Comment::where('user_id', 1)->where('approved' , 1)->get();
        return view('home.page.users_profile.index' , compact('comments'));
    }
}