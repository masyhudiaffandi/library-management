<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->has('search')) {
            $books = Book::where('title', 'like', '%'. request('search'). '%')
                ->orWhere('year', 'like', '%'. request('search'). '%')
                ->orWhereHas('author', function ($query) {
                    $query->where('name', 'like', '%'. request('search'). '%');
                })
                ->paginate(10);

                $authors = Author::where('name', 'like', '%'. request('search'). '%')->get();
        } else {
            $books = Book::paginate(10);
            $authors = Author::all();
            $publishers = Publisher::all();
        }

        return view('admin.book.book', compact('books', 'authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all();

        return view('admin.book.create.book-create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' =>'required',
            'author_id' =>'required',
            'year' =>'required',
        ]);

        Book::create([
            'title' => $request->title,
            'author_id' => $request->author_id,
            'year' => $request->year,
            'cover' => $request->file('cover')->store('photos/book_cover', 'public'),
        ]);

        return to_route('book.create')->with('success', 'Book created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        
        return view('admin.book.details.book-detail', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $book = Book::find($id);
        $authors = Author::all();
        $publishers = Publisher::all();

        return view('admin.book.edit.book-edit', compact('book', 'authors', 'publishers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title' =>'required',
            'author_id' =>'required',
            'year' =>'required',
        ]);

        $book = Book::find($id);
        $book->title = $request->title;
        $book->publisher_id = $request->publisher_id;
        $book->statuses = $request->statuses;
        $book->author_id = $request->author_id;
        $book->year = $request->year;
        if ($request->file('cover')) {
            $book->cover = $request->file('cover')->store('photos/book_cover', 'public');
        }
        $book->save();

        return to_route('book.edit', $book->id)->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        $book->delete();
        
        return redirect()->route('book.index')->with('success', 'Book deleted successfully');
    }
}
