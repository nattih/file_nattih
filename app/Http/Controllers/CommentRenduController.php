<?php

namespace App\Http\Controllers;

use App\CommentRendu;
use App\Notifications\NewCommentPosted;
use App\Rendu;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Comments;
use PhpParser\Node\Expr\New_;

class CommentRenduController extends Controller
{
    
    public function __construct()
    {
         $this->middleware('auth');
    }

    public function store(Rendu $rendu)
    {
        request()->validate([
            'content'=>  'required|min:5' 
          ]);
        $comment=new CommentRendu();
              $comment->content=request('content');
              $comment->user_id=auth()->user()->id;
        $rendu->Comments()->save($comment);

        //notifications stocke en db
        $rendu->user->notify(New NewCommentPosted($rendu, auth()->user()));
        
        return redirect()->route('rendu.show', $rendu);  
    }

    public function reponse(CommentRendu $comment)
    {
        request()->validate([
            'replyComment'=>  'required|min:3' 
          ]);
            $commentReply = new CommentRendu();
            $commentReply->content = request('replyComment');
            $commentReply->user_id=auth()->user()->id;
            $comment->Comments()->save($commentReply);
            return redirect()->back();
    }

}
