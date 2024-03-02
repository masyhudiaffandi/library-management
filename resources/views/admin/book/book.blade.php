@extends('layouts.app')

@section('page-title', 'Books')
@section('button-text', 'New Book')

@section('content')
<div class="page-header mb-4">
    @include('layouts.author.page-header', ['createRoute' => route('book.create')], ['searchRoute' => route('book.index')])
</div>

<div class="page-content border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
    <div class="table-content">
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Cover</th>
                    <th>Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author->name }}</td>
                        <td><img src="{{ asset('storage/'.$book->cover) }}" alt="{{ $book->title }}" width="50px"></td>
                        <td>{{ $book->year }}</td>
                        <td class="actions flex gap-2">
                            @include('components.edit-button', ['edit' => route('book.edit', $book)])
                            @include('components.delete-button', ['destroy' => route('book.destroy', $book), 'data' => 'Book'])
                            @include('components.detail-button', ['show' => route('book.show', $book->id)])
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
