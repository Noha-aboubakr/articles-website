<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail; 
use App\Models\Contact; 
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function contact()  
    {  
        return view ('public.contact'); 
    } 

    public function sendemail(Request $request)  
    {  
        $data = $request->validate([  
            'name' => 'required|string|max:100',  
            'email' => 'required|email|max:100',  
            'subject' => 'required|string|max:100',  
            'message' => 'required|string|max:2000',  
        ]);

        Contact::create($data); 

        Mail::to('hello@example.com')->send(new ContactMail($data));     
        
        return redirect()->route('articles.contact')->with('Your message has been sent successfully!'); 
}  

 /**
     * Display a listing of the resource.
     */
    public function msgsindex()
    {
        $contacts = Contact::get();
        return view('admin.messages.messages', compact('contacts'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact= Contact::findOrFail($id);
        $contact->is_read = 1;  
        $contact->save(); 
        return view ('admin.messages.message_details', compact('contact'));
    }


    public function markAsRead($id)  
    {  
    $contact = Contact::findOrFail($id);  
    $contact->is_read = 1;  
    $contact->save();  
    }  

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Contact::where('id', $id)->delete();
        return redirect()->route('messages.msgsindex');

    }

}

