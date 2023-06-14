<?php

namespace App\Models;

use App\Models\Image;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Article extends Model
{
    use HasFactory;
    use Searchable;
    protected $fillable = ['title', 'price', 'body', 'user_id','category_id','is_accepted'];

    public function toSearchableArray() {
        $category = $this->category;
        $array = [
            'id'=> $this->id,
            'title'=> $this->title,
            'body'=> $this->body,
            'category'=> $this->category,
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
    public function setNull($article){
        $this->is_accepted = null;
        $this->save();
        return true;

    }


    public static function toBeRevisionedCount(){
        return Article::where('is_accepted',null)->count();
    }





    public function images(){
        return $this->hasMany(Image::class);
    }
}
