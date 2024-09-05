<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Traits\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{ 
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)  
    {  
        $data = $request->validate([  
            'name' => 'required|string|max:100',  
            'content' => 'required|string',   
            'published' => 'boolean',  
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',     
        ]);  
     
        $data['published']=isset($request->published); 
       
        if ($request->hasFile('image')) {  
            $data['image'] = $this->uploadFile($request->image, 'adminassets/images/testimonials');  
        }  

        Testimonial::create($data); 
        return redirect()->route('testimonials.index');  
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $testimonial = Testimonial::findOrFail($id);
        // return view('testimonials.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)  
{  
      $data = $request->validate([  
        'name' => 'required|string|max:100',  
        'content' => 'required|string',   
        'published' => 'boolean',  
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',     
    ]);  

       $data['published']=isset($request->published); 

    if ($request->hasFile('image')) {  
        $data['image'] = $this->uploadFile($request->image, 'adminassets/images/testimonials');  
    }  
   
    Testimonial::where('id', $id)->update($data);  
    return redirect()->route('testimonials.index');  
}  

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Testimonial::where('id', $id)->delete();
        return redirect()->route('testimonials.index');
    }
}
