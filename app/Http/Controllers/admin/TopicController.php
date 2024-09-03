<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Topic; 
use App\Models\Category; 
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()  
    {  
        $topics = Topic::where('published', 1)->with('category')->get();  
        return view('admin.topics.index', compact('topics'));  
    } 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(); 
        return view('admin.topics.create', compact('categories'));  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)  
    {  
        // Validate the incoming request data  
        $topic = $request->validate([  
            'topictitle' => 'required|string|max:100',  
            'category' => 'required|exists:categories,id',  
            'content' => 'required|string',  
            'trending' => 'boolean',  
            'published' => 'boolean',  
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  
        ]);  
    
        $topic['category_id'] = $request->input('category');
        $topic['trending'] = isset($request->trending);  
        $topic['published'] = isset($request->published);  
        $topic['image'] = $this->uploadFile($request->image, 'public/adminassets/images/topics');  
    
        Topic::create($topic);  
        return redirect()->route('topics.index');  
    }  
     
    protected function uploadFile($file, $path)  
    {  
        return $file->store($path, 'public'); 
    }
    
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
            $topic = Topic::with('category')->findOrFail($id);  
            $topic->increment('views');  
            return view('topics.show', compact('topic'));  
        }  
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
