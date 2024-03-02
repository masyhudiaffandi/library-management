@extends('layouts.app')

@section('page-title', 'Edit Publisher')
@section('button-text', 'Edit Publisher')

@section('content')
    <div class="container">
        <div class="page-header flex mb-4">
            @include('layouts.author.page-header')
        </div>

        <form action="{{ route('publisher.update', $publisher->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-input flex flex-col gap-4 page-content border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                <div class="form-group flex flex-col">
                    <label for="name">Publisher Name</label>
                    <input type="text" name="name" class="rounded-md" value="{{ $publisher->name }}">
                </div>
                <div class="form-group flex flex-col">
                    <label for="address">Publisher Address</label>
                    <input type="text" name="address" class="rounded-md" value="{{ $publisher->address }}">
                </div>
            </div>
            <div class="form-button mt-2">
                <input type="submit" class="btn btn-accent" value="Save" />
                <a href="{{ route('publisher.index') }}" class="btn btn-default">Cancel</a>
            </div>
        </form>
    </div>
@endsection
