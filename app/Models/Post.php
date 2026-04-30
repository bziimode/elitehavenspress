<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'description',
        'article_date',
        'publish_date',
        'thumbnail',
        'filename',
        'author',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'status',
        'created_by',
    ];
}
