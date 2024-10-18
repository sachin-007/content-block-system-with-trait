@extends('layouts.app')

@section('title', 'Pages List')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Pages List</h1>
        <a href="{{ route('pages.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-150 ease-in-out">
            <i class="fas fa-plus mr-2"></i>Create New Page
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
        @foreach($pages as $page)
            <a href="{{ route('pages.show', $page->id) }}" 
               class="block p-6 bg-white border rounded-lg shadow hover:shadow-md transition duration-150 ease-in-out">
                <h2 class="text-xl font-semibold text-gray-900 mb-2">{{ $page->title }}</h2>
                <p class="text-gray-600 truncate">{{ $page->description }}</p>
                <div class="mt-4 flex justify-end">
                    <span class="text-blue-600 hover:text-blue-800">View Details →</span>
                </div>
            </a>
        @endforeach
    </div>
</div>
