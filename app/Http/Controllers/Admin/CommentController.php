<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::Paginate(10);
        return view('admin.comment.inedex', compact('comments'));
    }



    public function delete(Comment $comment)
    {
        $comment->delete();
        return back();
    }




    /* -- change status -- */
    public function status(Comment $comment) {
        $comment->status = $comment->status == 1 ? 0 : 1;
        $comment->save();
        return to_route('admin.comment.index')->with('alert-success', 'وضعیت کامنت شما با موفقیت تغییر کرد !');
    }







    public function show(Comment $comment)
    {
        return view('admin.comment.show', compact('comment'));
    }



    public function ShowCreate(Comment $comment, Request $request)
    {
        $inputs = $request->validate([
            'comment' => ['required', 'min:5', 'max:1000']
        ]);

        $inputs['parent_id']  = $comment->id;
        $inputs['product_id'] = $comment->product_id;
        $inputs['user_id']    = auth()->user()->id;
        $inputs['status']     = 1;


        $comment->create($inputs);
        return to_route('admin.comment.index')->with('alert-success', 'نظر شما با موفقیت ثبت شد!');
    }




}
