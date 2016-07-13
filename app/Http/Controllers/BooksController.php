<?php

namespace App\Http\Controllers;

use App\Models\FrontEnd\Books\Book;
use Illuminate\Http\Request;

use App\Http\Requests;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("frontend.Books.AllBooks")->with(
            [
                "books"=>Book::paginate(10)
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("frontend.Books.CreateBook");
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
            'author'  => 'required|string',
            'genre'     => 'required|string',
            'year'     => 'required|Integer|Min:4',
            'title'     => 'required',
        ]);

        Book::create($request->all());

        return redirect()->action('BooksController@index')->with('dialog', 'New book is created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("frontend.Books.EditBook")->with([
            "book"=>Book::findOrFail($id)
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
        $book = Book::findOrFail($id);

        $this->validate($request, [
            'author'  => 'required|string',
            'genre'     => 'required|string',
            'year'     => 'required|Integer|Min:4',
            'title'     => 'required',
        ]);

        $book->author = $request->get("author");
        $book->genre = $request->get("genre");
        $book->year = $request->get("year");
        $book->title = $request->get("title");

        $book->save();

        return redirect()->action('BookController@index')->with('dialog', 'Book saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
