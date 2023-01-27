<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class BookController extends Controller
{
    
    public function index(){
        
        
        return view('contents.books.index');
    }

    public function table() {
        $books = Book::select('id', 'title');

        return DataTables::of($books)
        ->addColumn('actions', function($book){

            return '
                <div class="d-flex flex-row bd-highlight mb-3">
                    <a href="'.route('books.edit', ['book' => $book]).'" class="btn btn-success m-1">Edit</a>
                    <button onclick="remove('.$book->id.')" class="btn btn-danger m-1">Delete</button>
                    
                </div>
            ';

        })
        ->rawColumns(['actions'])
        ->make(true);
    }

    public function create(){
        return view('contents.books.add');
    }
    
    public function store(StoreBookRequest $request)
    {
        try {

            Auth::user()->books()->create([
                'title' => $request->title,
                'content' => $request->content
            ]);

            return redirect()->route('books.index')->with('success', 'Book has been published.');
            
        } catch (\Throwable $th) {
            return back()->with('error', 'Oops, something went wrong.');
        }
    }
    
    public function show($id)
    {
        //
    }
    
    public function edit(Book $book)
    {
        return view('contents.books.edit')->with('book', $book);
    }
    
    public function update(UpdateBookRequest $request, Book $book)
    {
        try {
            
            $book->update([
                'title' => $request->title,
                'content' => $request->content
            ]);

            return redirect()->route('books.index')->with('success', $request->title.' has been updated');

        } catch (\Throwable $th) {
            return back()->with('error', 'Oops, something went wrong.');
        }
    }
    
    public function destroy(Book $book)
    {
        try {
            $title = $book->title;
            $book->delete();

            return redirect()->route('books.index')->with('success', $title.' has been deleted.');

        } catch (\Throwable $th) {
            return back()->with('error', 'Oops, something went wrong.');
        }
    }
}
