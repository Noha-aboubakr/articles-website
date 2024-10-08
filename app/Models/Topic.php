<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{  
    use HasFactory;  

    protected $fillable = [
        'topictitle', 
        'content', 
        'published', 
        'trending', 
        'image',
        'views', 
        'category_id'];  

    public function category()  
    {  
        return $this->belongsTo(Category::class);  
    }  

    public function incrementViews()  
    {  
        $this->increment('views');  
        $this->save();  
    }  
}  

