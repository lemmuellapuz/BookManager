<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;

class PublishedBookController extends Controller
{
    public function index() {
        return view('contents.published.index');
    }

    public function table() {
        $books = Book::join('users', 'users.id', 'books.user_id')
        ->select('books.id', 'books.title', 'users.name');

        return DataTables::of($books)
        ->addColumn('actions', function($book){
            return '<a class="btn btn-primary" href="'.route('published-books.view', ['book'=>$book]).'" >Read</a>';
        })
        ->rawColumns(['actions'])
        ->make(true);
    }

    public function view(Book $book) {
        $published = $book->with('user')->first();
        return view('contents.published.view')->with('book', $published);
    }
}
