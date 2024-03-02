@extends('layouts.app')

@section('page-title', 'New Book')
@section('button-text', 'New Book')

@section('content')
    <div class="container">
        <div class="page-header flex mb-4">
            @include('layouts.author.page-header')
        </div>

        <form action="{{ route('book.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-input flex flex-col gap-4 page-content border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                <div class="form-group flex flex-col">
                    <label for="title">Book Title</label>
                    @include('components.input-data', ['name' => 'title', 'type' => 'text'])
                </div>
                <div class="form-group flex flex-col">
                    <label for="author_id">Author</label>
                    <select name="author_id" class="rounded-md">
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group flex flex-col">
                    <label for="year">Year</label>
                    @include('components.input-data', ['name' => 'year', 'type' => 'number'])
                </div>
                <div class="form-group flex flex-col">
                    <label for="cover">Book Cover</label>
                    @include('components.input-data', ['name' => 'cover', 'type' => 'file'])
                </div>
            </div>
            <div class="form-button mt-2">
                @include('components.submit-button', ['value' => 'Submit'])
                @include('components.cancel-button', ['url' => route('book.index')])
            </div>
        </form>
    </div>
@endsection
