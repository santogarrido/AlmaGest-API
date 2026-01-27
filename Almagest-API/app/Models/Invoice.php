<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    use HasFactory;

    protected $table = "invoices";

    protected $fillable = [
        'num',
        'issuedate',
        'delivery_note_id',
        'deleted'
    ];


    public function deliveryNote(): BelongsTo{
        return $this->belongsTo(DeliveryNote::class, 'delivery_note_id');
    }

    public function invoiceLines(): HasMany{
        return $this->hasMany(InvoiceLine::class, 'invoice_id');
    }

}
