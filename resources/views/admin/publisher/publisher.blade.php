@extends('layouts.app')

@section('page-title', 'Publisher')
@section('button-text', 'New Publisher')

@section('content')
<div class="page-header mb-4">
    @include('layouts.author.page-header', ['createRoute' => route('publisher.create')])
</div>

<div class="page-content border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
    <div class="table-content">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($publishers as $publisher)
            <tr>
                <td>{{ $publisher->name }}</td>
                <td>{{ $publisher->address }}</td>
                <td class="flex gap-2">
                    @include('components.edit-button', ['edit' => route('publisher.edit', $publisher->id)])
                    @include('components.delete-button', ['destroy' => route('publisher.destroy', $publisher->id), 'data' => 'Publisher'])
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>



@include('components.pagination', ['paginator' => $publishers])
@endsection