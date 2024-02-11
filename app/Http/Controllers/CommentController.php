<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function create(){

        // $request->validate([
        //     "article_id"=>"required",
        //     "content"=>"required",
        // ]);

        $comment = new Comment();
        $comment->article_id = request()->article_id;
        $comment->content = request()->content;
        $comment->user_id =auth()->user()->id;
        $comment->save();

        return back();


    }
    public function delete($id){
        $comment = Comment::find($id);
        // if($comment->user_id == Auth()->user()->id){
        //     $comment->delete();
        //     return back()->with('info','comment-deleted');
        // }else{
        //     return back()->with('error','Unauthorized');
        // }
            if(Gate::allows('comment-delete',$comment)){
                $comment->delete();
                return back()->with('indo','comment-deleted');
            }else{
                return back()->with('error','Unauthorized');
            }

    }
}
