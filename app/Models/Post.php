<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'image',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
        'title',
        'topic',
        'content',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
