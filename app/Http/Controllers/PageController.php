<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{

     // Display the form to create a new page
     public function create()
     {
         return view('pages.create');
     }
 
     // Handle form submission and store the new page
     public function store(Request $request)
     {
         // Validate the input fields
         $request->validate([
             'title' => 'required|string|max:255',
             'description' => 'required|string',
         ]);
 
         // Create the new page with the provided title and description
         Page::create([
             'title' => $request->title,
             'description' => $request->description,
         ]);
 
         // Redirect to the list of pages with a success message
         return redirect()->route('pages.index')->with('success', 'Page created successfully!');
     }

     
    // List all pages
    public function index()
    {
        // Retrieve all pages from the database
        $pages = Page::all();

        // Return a view and pass the pages to it
        return view('pages.index', compact('pages'));
    }


    // Display a page with its content blocks
    public function show($id)
    {
        $page = Page::with('contentBlocks')->findOrFail($id);
        return view('pages.show', compact('page'));
    }

    // Store a new content block
    public function storeContentBlock(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        // Validate the request
        $request->validate([
            'type' => 'required|in:text,image',
            'content' => 'required|string'
        ]);

        // Add the content block
        $page->addContentBlock($request->type, $request->content);

        return redirect()->back()->with('success', 'Content block added successfully!');
    }
}
