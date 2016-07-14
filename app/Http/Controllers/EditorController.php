<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\FrontEnd\Books\Book;

class EditorController extends Controller
{
    /**
     * Revokes the specified book from user.
     *
     * @param  int  $bookid
     * @return \Illuminate\Http\Response
     */
    public function revokeBook($bookid){
        $book = Book::findOrFail($bookid);
        $bookUser = $book->book_user_id;
        $book->book_user_id=null;
        $book->save();

        return redirect()->action('BookUsersController@show',$bookUser)
                                ->with('dialog', 'Book revoked back to library');
    }
}
