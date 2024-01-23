<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class BookController
{
    public function index()
    {
        return Cache::remember('all_books', now()->addMinutes(10), function () {
            return Book::all();
        });
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

        Cache::forget('all_books');

        return $book;
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        $book->name = $request->name;
        $book->author = $request->author;
        $book->category_id = $request->category_id;

        $book->save();

        Cache::forget('all_books');

        return Book::all();
    }

    public function delete($id)
    {
        $book = Book::find($id);
        $book->delete();

        Cache::forget('all_books');

        return Book::all();
    }
}
