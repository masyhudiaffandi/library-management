@extends('layouts.app')

@section('page-title', 'Authors')
@section('button-text', 'New Author')

@section('content')

<div class="page-header mb-4">
    @include('layouts.author.page-header', ['createRoute' => route('author.create')])
</div>

<div class="page-content border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700"">  
    <div class="content-table">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>   
            </thead>
            <tbody>
                @foreach ($authors as $author)
                <tr>
                    <td>{{ $author->name }}</td>
                    <td><img src="{{ asset('storage/'. $author->photo) }}" class="w-16 rounded-full" alt=""></td>
                    <td class="flex gap-2">
                        @include('components.edit-button', ['edit' => route('author.edit', $author->id)])
                        @include('components.delete-button', ['destroy' => route('author.destroy', $author->id), 'data' => 'Author'])
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
