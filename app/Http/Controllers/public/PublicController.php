<?php  

namespace App\Http\Controllers\Public;  

use Illuminate\Http\Request;  
use App\Http\Controllers\Controller;  
use App\Models\Topic;
use App\Models\Category;
use App\Models\Testimonial;

class PublicController extends Controller  
{  
    public function index()  
    {  
        $topics = Topic::with('category')  
        ->orderBy('views', 'desc')  
        ->take(2)  
        ->get();  


        $categories = Category::with(['topics' => function ($query) {   
            $query->where('published', 1)->take(3);   
        }])->limit(4)->get();  


        $testimonials = Testimonial::where('published', 1)->latest()->take(3)->get();  
    
        return view('public.index', compact('topics', 'categories', 'testimonials'));
    }  


    public function topicslisting()  
    {  
        return view ('public.topics-listing'); 
    }  

   
     public function topicsdetail($id) 
    {  
        $topic = Topic::findOrFail($id);  
        $topic->incrementViews();  
        
        return view('public.topics-detail', compact('topic')); 
    }  

    public function testimonials()  
    {  
        $testimonials = Testimonial::where('published', 1)->get();  
        return view('public.testimonials', compact('testimonials'));  
    }  

    // public function contact()  
    // {  
    //     return view ('public.contact'); 
    // }   

    public function page404(){

        return view('public.404');
    }

    public function jobscategories()
    {
        $categories = Category::with(['topics' => function ($query) { $query->where('published', 1)->take(3); }])->limit(4)->get();
        // dd($categories);
        return view('public.index', compact('categories'));
    }
   
}
