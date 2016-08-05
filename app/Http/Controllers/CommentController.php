<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Location;
use App\Comment;

class CommentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createComment(Request $request, $loc_id)
    {
        $this->validate($request, [
            'body' => 'required|max:1000'
        ]);
        $comment = new Comment();
        $comment->commentBody = $request['body'];
        $comment->location_id = $loc_id;
        $message = 'There was an error while posting your comment.';
        if ($request->user()->comments()->save($comment)) {
            $message = 'Comment successfully posted!';
        }
        return redirect()->back()->with(['message' => $message]);
    }

    public function deleteComment($comment_id)
    {
        $comment = Comment::where('id', $comment_id)->first();
        if (Auth::user()->id != $comment->user_id) {
            return redirect()->back();
        }
        $comment->delete();
        return redirect()->back()->with(['message' => 'Comment successfully deleted!']);
    }

    public function show(Location $location, Comment $comment)
    {
        return view('comments.show', compact('location', 'comment'));
    }

    public function edit(Location $location, Comment $comment)
    {
        return view('comments.edit', compact('location', 'comment'));
    }


    public function update(Location $location, Comment $comment, Request $request)
    {
        //$this->validate($request, $this->rules);

      //  $input = array_except($request->input(), '_method');
       // $comment->update($input);

        return Redirect::route('locations.comments.show', [$location->slug, $comment->locationId])->with('message', 'Comment updated.');
    }

}
