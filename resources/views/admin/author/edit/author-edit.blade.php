@extends('layouts.app')

@section('page-title', 'Edit Author')
@section('button-text', 'Edit Author')

@section('content')
    <div class="container">
        <div class="page-header flex mb-4">
            @include('layouts.author.page-header')
        </div>

        <form action="{{ route('author.update', $author->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-input flex flex-col gap-4 page-content border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                <div class="form-group flex flex-col">
                    <label for="name">Author Name</label>
                    @include('components.input-data', ['name' => 'name','type' => 'text', 'value' => $author->name ])
                </div>
                <div class="form-group flex flex-col">
                    <label for="photo">Author Photo</label>
                    @include('components.input-data', ['name' => 'photo','type' => 'file' ])
                    <img src="{{ asset('storage/' . $author->photo) }}" alt="Author Photo" class="mt-2 rounded-md" style="max-width: 200px;">
                </div>
            </div>
            <div class="form-button mt-2">
                <input type="submit" class="btn btn-accent" value="Save" />
                <a href="{{ route('author.index') }}" class="btn btn-default">Cancel</a>
            </div>
        </form>
    </div>
@endsection
