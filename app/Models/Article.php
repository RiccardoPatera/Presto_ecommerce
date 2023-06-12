<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Article extends Model
{
<<<<<<< HEAD
=======
    use HasFactory;
    use Searchable;
    protected $fillable = ['title', 'price', 'body', 'img', 'user_id','category_id','is_accepted'];
>>>>>>> 12686eb5b45a7f0f32db90587fe1d56d93a90067

    use Hasfactory, Searchable;
    protected $fillable = ['title', 'price', 'body', 'img', 'user_id', 'category_id'];

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
}
