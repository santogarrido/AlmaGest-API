<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';
    protected $fillable = ['name', 'description', 'price_min', 'price_max', 'color_name', 'weight', 'size', 'family_id', 'deleted'];

    //Family - Article (1-N) Relationship
    public function Family(){
        return $this->belongsTo(Family::class, 'family_id');
    }

    //Article - Contain_Art_OrderLine (1-N) Relationship
    public function Contain_art_orderline()  {
        return $this->hasMany(ContainArtOrderline::class,'order_line_id');
    }

    public function Product()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
}
