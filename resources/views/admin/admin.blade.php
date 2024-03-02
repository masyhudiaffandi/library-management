@extends('layouts.app')

@section('page-title', 'Library Dashboard')

@section('content')
<div class="page-header mb-4">
    @include('layouts.author.page-header')
</div>

<div class="page-content border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 p-4">
    <div class="total-data flex flex-col gap-4">
    <h1 class="text-xl font-bold">Total Data</h1>
        <div class="flex flex-col md:flex-row gap-4">
            @include('components.statistics-card', ['title' => 'Authors', 'count' => $authorCount, 'route' => route('author.index')])
            @include('components.statistics-card', ['title' => 'Publishers', 'count' => $publisherCount, 'route' => route('publisher.index')])
            @include('components.statistics-card', ['title' => 'Books', 'count' => $bookCount, 'route' => route('book.index') ])
        </div>
    </div>

</div>
@endsection