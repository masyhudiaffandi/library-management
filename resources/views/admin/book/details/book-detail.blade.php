@extends('layouts.app')

@section('page-title', 'Book Detail')

@section('content')
<div class="book">
    <div class="page-header flex flex-col mb-4">
        @include('layouts.author.page-header')
    </div>

    <div class="book-detail flex gap-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700  p-4">
        <div class="book-detail-cover w-56 rouned-md">
            <img src="{{ asset('storage/'.$book->cover) }}" class="rounded-md" alt="{{ $book->name }}">
        </div>
        <div class="book-detail-info flex flex-col gap-4">
            <div class="book-detail-title flex gap-4 items-center">
                <h1 class="book-detail-title text-3xl">{{ $book->title }}</h1>
                <kbd class="kbd kbd-sm book-detail-year">{{ $book->year }}</kbd>
                <kbd class="kbd kbd-sm">Status : {{ $book->statuses }}</kbd>
            </div>
            <div class="book-detail-author flex gap-2 items-center">
                <img src="{{ asset('storage/'.$book->author->photo) }}" class="w-8 rounded-full" alt="">
                <p class="book-detail-author text-sm">{{ $book->author->name }}</p>
            </div>
            <div class="book-info-text">
                <p>{{ $book->publisher->name }}</p>
                <p>{{ $book->publisher->address }}</p>
                <p>
                </p>
            </div>
        </div>
    </div>

    <div class="back-button mt-4">
        <a href="{{ route('book.index') }}" class="btn btn-accent text-white">Back</a>
    </div>
</div>
@endsection