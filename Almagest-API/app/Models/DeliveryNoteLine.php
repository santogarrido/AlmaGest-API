<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DeliveryNoteLine extends Model
{
    use HasFactory;

    protected $table = 'delivery_note_lines';

    protected $fillable = [
        'id',
        'delivery_note_id',
        'delivery_note_line_num',
        'order_line_id',
        'issue_date',
        'deleted'
    ];

    public function delivery_note(){
       return $this -> belongsTo(DeliveryNote::class, 'delivery_note_id');
    }

    public function order_line(){
       return $this -> belongsTo(OrderLine::class,'order_line_id');
    }

   public function invoice_line(){
       return $this -> hasMany(InvoiceLine::class, 'delivery_lines_id');
   }

   public function contain_art_delivline(){
       return $this -> hasMany(ContainArtDelivline::class, 'delivery_lines_id');
   }
}
