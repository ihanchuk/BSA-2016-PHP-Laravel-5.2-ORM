<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\FrontEnd\Users\BookUser;
use App\Models\FrontEnd\Books\Book;

class BookUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("frontend.Users.AllUsers")->with(
            [
                "users"=>BookUser::paginate(10)
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("frontend.Users.CreateUser");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name'  => 'required|string',
            'last_name'     => 'required|string',
            'email'     => 'required|email',
        ]);
        BookUser::create($request->all());
        return redirect()->action('BookUsersController@index')->with('dialog', 'User created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = BookUser::findOrFail($id);
        $books = $user->books->toArray();

        return view("frontend.Users.UserShow")->with([
            "user"=>$user,
            "books"=>$books
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("frontend.Users.UserEdit")->with([
            "user"=>BookUser::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = BookUser::findOrFail($id);

        $this->validate($request, [
            'first_name'  => 'required|string',
            'last_name'     => 'required|string',
            'email'     => 'required|email',
        ]);

        $user->first_name = $request->get("first_name");
        $user->last_name = $request->get("last_name");
        $user->email = $request->get("email");
        $user->save();

        return redirect()->action('BookUsersController@index')->with('dialog', 'User saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = BookUser::findOrFail($id);
        $userBooks = $user->books->toArray();

        foreach($userBooks as $book){
            $b  = Book::findOrFail($book["id"]);
            $b->book_user_id = null;
            $b->save();
        }

        $user->delete();

        return redirect()->action('BookUsersController@index')->with('dialog', 'User deleted');
    }

}
