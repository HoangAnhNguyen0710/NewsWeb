<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'likes';
    protected $fillable = [
        'id',
        "created_at",
        "updated_at",
        "deleted_at",
        "user_id",
        "article_id",
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function article() {
        return $this->belongsTo(Article::class, 'article_id', 'id');
    }

    public $timestamps = true;
}
