<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Article extends Model
{
    //use HasFactory;
    //protected $fillable = ['title', 'price', 'body', 'img', 'user_id','category_id'];

    use Hasfactory, Searchable;
    protected $fillable = ['title', 'price', 'body', 'img', 'user_id', 'category_id'];

    public function toSearchableArray() {
        $category = $this->category;
        $array = [
            'user_id'=> $this->user_id,
            'title'=> $this->title,
            'body'=> $this->body,
            'category_id'=> $this->category_id,
        ];
        return $array;
    }



    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function setAccepted($value){
        $this->is_accepted = $value;
        $this->save();
        return true;

    }
    public static function toBeRevisionedCount(){
        return Article::where('is_accepted',null)->count();
    }
}
