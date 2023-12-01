<?php

namespace App\Models;

// use Illuminate\Contracts\AuthController\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Post extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'author','image_post', 'title', 'description', 'content', 'meta_desc', 'meta_keyword', 'status', 'url_seo'
    ];





}
