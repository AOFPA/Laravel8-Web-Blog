<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $category = Category::count();
        $post = Post::count();
        $user = User::where('role_as', '0')->count();
        $admin = User::where('role_as', '1')->count();
        return view('admin.dashboard', compact('category', 'post','user','admin'));
    }
}