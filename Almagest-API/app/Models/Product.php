<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table='products';

    protected $fillable = [
        'id',
        'article_id',
        'company_id',
        'price',
        'stock',
        'color_name',
        'weight',
        'size',
        'family_id',
        'deleted'
    ];

    public function company(){
       return $this -> belongsTo(Company::class, 'company_id');
    }

    public function article(){
       return $this -> belongsTo(Article::class, 'article_id');
    }

    public function family(){
       return $this -> belongsTo(Family::class, 'family_id');
    }
}
