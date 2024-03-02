@extends('layouts.app')

@section('page-title', 'New Authors')
@section('button-text', 'New Author')

@section('content')
    <div class="container">
        <div class="page-header flex mb-4">
            @include('layouts.author.page-header')
        </div>

        <form action="{{ route('author.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-input flex flex-col gap-4 page-content border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                <div class="form-group flex flex-col">
                    <label for="name">Author Name</label>
                    @include('components.input-data', ['name' => 'name'], ['type' => 'text'])
                </div>
                <div class="form-group flex flex-col">
                    <label for="photo">Author Photo</label>
                    @include('components.input-data', ['name' => 'photo'], ['type' => 'file'])
                </div>
            </div>
            <div class="form-button mt-2">
                <input type="submit" class="btn btn-accent text-white"       value="Submit" />
                <a href="{{ route('author.index') }}" class="btn btn-default">Cacnel</a>
            </div>
        </form>
    </div>
@endsection