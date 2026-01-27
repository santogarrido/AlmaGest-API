<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Family extends Model
{
    use HasFactory;

    protected $table = 'families';
    protected $fillable = ['name','profit_margin','deleted'];

    //Family - Article (1-N) Relationship
    public function Article()
    {
        return $this->hasMany(Article::class, 'family_id');
    }

    public function Product()
    {
        return $this->hasMany(Product::class, 'family_id');
    }
}
