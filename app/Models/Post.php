<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class Post extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'description', 'content', 'category_id', 'image', 'is_main'];


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public static function uploadImage(Request $request, $image = null)
    {
        if($request->hasFile('image')){
            if($image){
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
//            dd(Image::make(request()->file('image'))->resize(630   , 360)->save("uploads/images/{$folder}/foo.jpg"));
            $request->file('image')->store("images/{$folder}");
            Image::make(request()->file('image'))->resize(630   , 360)->save("uploads/images/{$folder}/foo.jpg");

          return $request->file('image')->store("images/{$folder}");
        }else {
            return null;
        }
    }

    public function getImage()
    {
        if(!$this->image){
            return asset('no-image.png');
        }

        return asset("uploads/{$this->image}");
    }

    public function getPostDate()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s',$this->created_at)->format('d F, Y');
    }
}
