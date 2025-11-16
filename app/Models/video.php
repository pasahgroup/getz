<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    use HasFactory;

    protected $table = 'movie_videos';
    protected $fillable = ['video_title','video_image'];


    public $timestamps = false;
 
     
    
    public static function getMoviesInfo($id,$field_name) 
    { 
        $movie_info = video::where('status','1')->where('id',$id)->first();
        
        if($movie_info)
        {
            return  $movie_info->$field_name;
        }
        else
        {
            return  '';
        }
        
    }
}
