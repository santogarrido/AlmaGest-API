<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContainArtInvline extends Model
{
    use HasFactory;

    protected $table = 'contain_art_invlines';
    protected $fillable = [
        'article_id',
        'invoice_line_id',
        'deleted'
    ];

    public function Invoice_line(){
        return $this->belongsTo(InvoiceLine::class, 'invoice_line_id');
    }

    public function Article(){
        return $this->belongsTo(ContainArtDelivline::class, 'article_id');
    }
}
