<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Book;
use App\Models\Category;
use App\Models\Detail;

class bookController extends Controller
{
    public function getBooks(){
        $books = Category::join('books', 'books.category_id', '=', 'categories.id')->join('details', 'details.book_id', '=', 'books.id')
        ->get(['books.title', 'categories.category', 'details.author', 'details.publisher', 'details.year', 'books.id']);

        return view('books', compact('books'));
    }

    public function upload(Request $req){
        $rules = [
            'title' => 'required',
            'category_id' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'year' => 'required',
            'description' => 'required'
        ];

        $req->validate($rules);

        $newBook = new Book();
        $newBook->title = $req->title;
        $newBook->category_id = $req->category_id;
        $newBook->save();

        $newBookDetails = new Detail();
        $newBookDetails->book_id = $newBook->id;
        $newBookDetails->author = $req->author;
        $newBookDetails->publisher = $req->publisher;
        $newBookDetails->year = $req->year;
        $newBookDetails->description = $req->description;
        $newBookDetails->save();

        return redirect()->back();
    }

    public function show(Book $books){

        return view('bookdetails', compact('books'));
    }
}
