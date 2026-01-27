<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContainArtOrderline extends Model
{
    use HasFactory;

    protected $table = 'contain_art_orderlines';
    protected $fillable = ['article_id','order_line_id'];

    //Article - Contain_Art_OrderLine (1-N) Relationship
    public function Article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
    //Order_Line - Contain_Art_OrderLine (1-N) Relationship
    public function Order_line()
    {
        return $this->belongsTo(Article::class, 'order_line_id');
    }
}
