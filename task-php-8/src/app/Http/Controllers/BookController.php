<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('created_at')->get();
        return view('layouts.book.index',['books'=>$books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book = new Book();
        $book->name = $request->name;
        $book->author = $request->author;
        $book->save();

        $books = Book::orderBy('created_at')->get();
        return view('layouts.book.index',['books'=>$books]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('layouts.book.edit',['book'=>$book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $book->name = $request->name;
        $book->author = $request->author;
        $book->save();

        $books = Book::orderBy('created_at')->get();
        return view('layouts.book.index',['books'=>$books]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        $books = Book::orderBy('created_at')->get();
        return view('layouts.book.index',['books'=>$books]);
    }
}
