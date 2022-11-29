<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
      /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';
    protected $fillable = [
        'id',
        "created_at",
        "updated_at",
        "category_name",
    ];

    public function articles(){
        return $this->hasMany(Article::class, 'category_id');
    }

    public $timestamps = true;
}
