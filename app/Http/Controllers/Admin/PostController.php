<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PostFormRequest ;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('admin.post.index',compact('posts'));
    }

    public function create(){
        $category = Category::where('status','0')->get();
        return view('admin.post.create' , compact('category'));
    }


    public function store(PostFormRequest $request){
        //รับข้อมูลที่ตรวจสอบแล้ว
        $data = $request->validated();

        //Model
        $post = new Post;
        //prepare
        $post->category_id = $data['category_id'];
        $post->name = $data['name'];
        $post->slug = $data['slug'];
        $post->description = $data['description'];
        $post->yt_iframe = $data['yt_iframe'];
        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keyword = $data['meta_keyword'];
        $post->status = $request->status == true ? '1' : '0' ;
        $post->created_by = Auth::user()->id ;
        //exec
        $post->save();

        return redirect('admin/posts')->with('message','Post Added Successfully');

    }

    public function edit($post_id){
        $post = Post::find($post_id);
        return view('admin.post.edit');
    }
}
