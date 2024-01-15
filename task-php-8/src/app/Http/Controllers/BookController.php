<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        return Book::all();
    }
    public function store(Request $request)
    {
        $book = new Book();
        $book->name = $request->name;
        $book->author = $request->author;
        $book->category_id = $request->category_id;

        $photo = $request->file('image');
        $photoName = time().'.'.$photo->getClientOriginalExtension();
        $photo->move(public_path('photos'), $photoName);
        $book->image= 'photos/' . $photoName;
        $book->save();
        return $book;
    }
    public function update(Request $request)
    {
        $book = Book::find($request->id);
        $book->name = $request->name;
        $book->author = $request->author;
        $book->category_id = $request->category_id;
        $book->save();

        return Book::all();
    }


    public function destroy(Request $request)
    {
        $book = Book::find($request->id);
        $book->delete();

        return Book::all();
    }
}
