@extends('layouts.app')

@section('title', $page->title)

@section('content')
<div class="bg-white rounded-lg shadow-sm p-6">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $page->title }}</h1>
        <p class="text-gray-600">{{ $page->description }}</p>
    </div>

    <div class="mb-8">
        <h3 class="text-xl font-semibold text-gray-900 mb-4">Content Blocks</h3>
        <div class="space-y-4">
            @foreach($page->contentBlocks as $block)
                <div class="border rounded-lg p-4 bg-gray-50">
                    @if($block->type == 'text')
                        <p class="text-gray-800">{{ $block->content }}</p>
                    @elseif($block->type == 'image')
                        <img src="{{ $block->content }}" alt="Content Block Image" 
                             class="rounded-lg max-w-full h-auto shadow-sm">
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <div class="border-t pt-6">
        <h3 class="text-xl font-semibold text-gray-900 mb-4">Add Content Block</h3>
        
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <form action="{{ route('pages.storeContentBlock', $page->id) }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                <select name="type" id="type" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="text">Text</option>
                    <option value="image">Image</option>
                </select>
            </div>

            <div>
                <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Content</label>
                <input type="text" name="content" id="content" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                       placeholder="Enter text or image URL" required>
            </div>

            <button type="submit" 
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-150 ease-in-out">
                <i class="fas fa-plus mr-2"></i>Add Block
            </button>
        </form>
    </div>
</div>
