<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Discount extends Model
{
    use HasFactory;

    protected $table = 'discount';

    protected $fillable = [
        'name',
        'discount',
        'deleted'
    ];

       public function company(): BelongsTo
   {
       return $this->belongsTo(Company::class, 'discount_id');
   }
}
