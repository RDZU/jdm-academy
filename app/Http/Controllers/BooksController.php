<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use DB;

class BooksController extends Controller
{
    
    public function index()
    {
$books = Book::first()->paginate(12);


return view('library',compact('books'));

    }



    public function show($book_slug){

$books = Book::where('slug', $book_slug)->firstOrFail();

return view('book',compact('books'));
    }

}
