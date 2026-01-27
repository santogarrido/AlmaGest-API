<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'name',
        'address',
        'city',
        'cif',
        'email',
        'phone',
        'del_term_id',
        'transport_id',
        'payment_term_id',
        'bank_entity_id',
        'discount_id',
        'deleted'
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'company_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'company_id');
    }

    public function deliveryTerm(): BelongsTo
    {
        return $this->belongsTo(DeliveryTerm::class, 'del_term_id');
    }

    public function transport(): BelongsTo
    {
        return $this->belongsTo(Transport::class, 'transport_id');
    }

    public function payment_term(): BelongsTo
    {
        return $this->belongsTo(PaymentTerm::class, 'payment_term_id');
    }

    public function bank_entity(): BelongsTo
    {
        return $this->belongsTo(BankEntity::class, 'bank_entity_id');
    }

    public function discount(): BelongsTo
    {
        return $this->belongsTo(Discount::class, 'discount_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'company_id');
    }


}

