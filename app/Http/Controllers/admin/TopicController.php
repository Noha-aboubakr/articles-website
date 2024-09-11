<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Traits\Common;
use App\Models\Topic; 
use App\Models\Category; 
use Illuminate\Http\Request;


class TopicController extends Controller
{
    use common;

    /**
     * Display a listing of the resource.
     */
    public function index()  
    {  
        $topics = Topic::with('category')->get();  
        return view('admin.topics.index', compact('topics')); 

    } 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'category_name')->get(); 
        return view('admin.topics.create', compact('categories'));  
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)  
    {  
        $data = $request->validate([  
            'topictitle' => 'required|string|max:100',  
            'category' => 'required|exists:categories,id',  
            'content' => 'required|string',  
            'trending' => 'boolean',  
            'published' => 'boolean',  
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',   
        ]);  
     
        if ($request->hasFile('image')) {  
            $data['image'] = $this->uploadFile($request->image, 'adminassets/images/topics');  
        }  
        $data['category_id'] = $request->input('category');  
        $data['trending'] = isset($request->trending);  
        $data['published'] = isset($request->published);  

        // dd($topic);
        Topic::create($data); 
        return redirect()->route('topics.index');  
    }
     
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
            $topic = Topic::with('category')->findOrFail($id);  
            $topic->increment('views');  
            return view('admin.topics.topic_details', compact('topic'));  
        }  

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)  
    {  
        $topic = Topic::findOrFail($id);   
        $categories = Category::all();   
        $category = $topic->category_id; 
        return view('admin.topics.edit', compact('topic', 'categories', 'category')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)  
{  
    $data = $request->validate([  
        'topictitle' => 'required|string|max:100',  
        'category_id' => 'required|exists:categories,id',  
        'content' => 'required|string',  
        'trending' => 'boolean',  
        'published' => 'boolean',  
        'image' => 'nullable|mimes:jpeg,jpg,png|max:2048',  
        
    ]);  

    if ($request->hasFile('image')) {  
        $data['image'] = $this->uploadFile($request->image, 'adminassets/images/topics');  
    }  
    $data['trending']=isset($request->trending); 
    $data['published']=isset($request->published);  

  
    Topic::where('id', $id)->update($data);  
    return redirect()->route('topics.index');  
}  

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Topic::where('id', $id)->delete();
        return redirect()->route('topics.index');
    }
}
