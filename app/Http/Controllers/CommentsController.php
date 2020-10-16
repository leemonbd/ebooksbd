<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Contact;
use Illuminate\Http\Request;
use DB;

class CommentsController extends Controller
{
    public function viewCommentsAdminPage(){
        $viewComments=Comment::all();

        return view('admin.comments.view-comments',[
            'viewComments'=>$viewComments
        ]);
    }

    public function removeComments($id){
        $removeComments=Comment::find($id);
        $removeComments->delete();

        return redirect('/view-comments-admin-page')->with('message','Comments deleted successfully');
    }

    public function truncateComments(){
        DB::table('comments')->truncate();
        return redirect('/view-comments-admin-page')->with('message','All Comments deleted successfully');
    }

    public function viewMessagesAdminPage(){
        $viewMessages=Contact::all();

        return view('admin.comments.view-contact-messages',[
            'viewMessages'=>$viewMessages
        ]);
    }

    public function removeMessage($id){
        $removeComments=Contact::find($id);
        $removeComments->delete();

        return redirect('/view-messages-admin-page')->with('message','message deleted successfully');
    }

    public function truncateMessages(){
        DB::table('contacts')->truncate();
        return redirect('/view-messages-admin-page')->with('message','All Messages deleted successfully');
    }
}
