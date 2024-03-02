<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::paginate(10);

        return view('admin.author.author', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //create
        return view('admin.author.create.author-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>'required',
            'photo' =>'required',
        ]);

        Author::create([
            'name' => $request->name,
            'photo' => $request->file('photo')->store('photos/author_photo', 'public'),
        ]);

        return to_route('author.create')->with('success', 'Author created successfully');
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
    public function edit(string $id)
    {
        // edit
        $author = Author::find($id);

        return view('admin.author.edit.author-edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' =>'required',
            'photo' =>'required',
        ]);

        $author = Author::find($id);
        $author->name = $request->name;
        $author->photo = $request->file('photo')->store('photos/author_photo', 'public');
        $author->save();

        return redirect()->route('author.index')->with('success', 'Author updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //delete
        $author = Author::find($id);

        Storage::delete('public/photos/author_photo/'. $author->photo);

        $author->delete();

        return redirect()->route('author.index')->with('success', 'Author deleted successfully');
    }
}
