@extends('layouts.app')

@section('page-title', 'Edit Book')
@section('button-text', 'Edit Book')

@section('content')
<div class="book ">
        <div class="page-header flex mb-4">
            @include('layouts.author.page-header')
        </div>

        <form action="{{ route('book.update', $book->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-input flex flex-col gap-4 page-content border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                <div class="form-group flex flex-col">
                    <label for="title">Book Title</label>
                    @include('components.input-data', ['name' => 'title', 'type' => 'text', 'value' => $book->title])
                </div>
                <div class="form-group flex flex-col">
                    <label for="author_id">Author</label>
                    <select name="author_id" class="rounded-md">
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}" @if($author->id === $book->author_id) selected @endif>{{ $author->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group flex flex-col">
                    <label for="year">Year</label>
                    @include('components.input-data', ['name' => 'year', 'type' => 'text', 'value' => $book->year])
                </div>
                <div class="form-group flex flex-col">
                    <label for="publisher_id">Publisher</label>
                    <select name="publisher_id" class="rounded-md">
                        @foreach($publishers as $publisher)
                            <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group flex flex-col">
                    <label for="statuses">Status</label>
                    <select name="statuses" class="rounded-md">
                            <option value="unpublished">Unpublished</option>
                            <option value="published">Published</option>
                    </select>
                </div>
                <div class="form-group flex flex-col">
                    <label for="cover">Book Cover</label>
                    @include('components.input-data', ['name' => 'cover', 'type' => 'file'])
                    <img src="{{ asset('storage/'.$book->cover) }}" alt="Book Cover" class="mt-2 rounded-md" style="max-width: 200px;">
                </div>
            </div>
            <div class="form-button mt-2">
                @include('components.submit-button', ['value' => 'Save'])
                @include('components.cancel-button', ['url' => route('book.index')])
            </div>
        </form>
    </div>
@endsection
