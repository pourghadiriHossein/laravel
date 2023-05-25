<?php

namespace App\Actions;

use App\Models\Comment;

class CommentAction {
    //Query Part
    public static function getAllComment(){
        $comments = Comment::all();
        return $comments;
    }
    public static function getComment($comment_id){
        $comment = Comment::find($comment_id);
        return $comment;
    }
    //Tools Part
    public static function checkState(Comment $comment)
    {
        if($comment->state == 0)
        {
            $comment->state = 1;
            $comment->save();
        }
        return back();
    }
    //Edit Part
    public static function updateComment($request, $comment_id)
    {
        $updateComment = self::getComment($comment_id);
        $updateComment->description = $request->input('description');
        $updateComment->status = $request->input('status');
        $updateComment->save();
        return back();
    }
    //necessary function

}
