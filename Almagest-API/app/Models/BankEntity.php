<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BankEntity extends Model
{

    use HasFactory;

    protected $table = 'bank_entities';

    protected $fillable = [
        'name', 'ccc', 'deleted'
    ];

    public function company(): HasMany{
        return $this -> hasMany(Company::class, 'bank_entity_id');
    }

}
