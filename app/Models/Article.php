<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'articles';
    protected $fillable = [
        'id',
        "title",
        "content",
        "creator_id",
        "category_id",
        "display_num",
        "created_at",
        "updated_at",
        "deleted_at",
        "display"
    ];

    protected $casts = [
        'display_num' => 'integer',
        'display' => 'boolean',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }

    public function category() {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }

    public $timestamps = true;
}
