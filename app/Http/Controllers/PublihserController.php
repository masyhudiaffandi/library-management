<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublihserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishers = Publisher::paginate(5);

        return view('admin.publisher.publisher', compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.publisher.create.publisher-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>'required',
            'address' =>'required',
        ]);

        Publisher::create([
            'name' => $request->name,
            'address' => $request->address,
        ]);

        return to_route('publisher.create')->with('success', 'Publisher created successfully');
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
        $publisher = Publisher::findOrFail($id);

        return view('admin.publisher.edit.publisher-edit', compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' =>'required',
            'address' =>'required',
        ]);

        $publisher = Publisher::findOrFail($id);
        $publisher->name = $request->name;
        $publisher->address = $request->address;
        $publisher->save();

        return to_route('publisher.index')->with('success', 'Publisher updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $publisher = Publisher::find($id);
        $publisher->delete();
        
        return to_route('publisher.index')->with('success', 'Publisher deleted successfully');
    }
}
