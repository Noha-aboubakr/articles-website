<?php  

namespace App\Http\Controllers\Public;  

use Illuminate\Http\Request;  
use App\Http\Controllers\Controller;  

class PublicController extends Controller  
{  
    public function index()  
    {  
        return view ('public.index');
    }  

    public function topicslisting()  
    {  
        return view ('public.topics-listing'); 
    }  

    // public function topicsdetail($id)  
     public function topicsdetail() 
    {  
        return view ('public.topics-detail'); 
    }  

    public function testimonials()  
    {  
        return view ('public.testimonials'); 
    }  

    // public function contact()  
    // {  
    //     return view ('public.contact'); 
    // }   

    public function page404(){

        return view('public.404');
    }

   
}
