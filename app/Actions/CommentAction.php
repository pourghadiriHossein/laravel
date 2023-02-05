<?php

namespace App\Actions;

use App\Models\Comment;

class CommentAction {
    //Query Part

    // Edit Part
    
    //Edit Part
    public static function updateComment($request, $comment_id)
    {
        $updateComment = Comment::find($comment_id);
        $updateComment->description = $request->input('description');
        $updateComment->status = $request->input('status');
        $updateComment->save();
        return back();
    }

    public static function checkState(Comment $comment)
    {
        if($comment->state == 0)
        {
            $comment->state = 1;
            $comment->save();
        }
        return back();
    }
}
