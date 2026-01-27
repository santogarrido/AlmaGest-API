<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    use HasFactory;

    protected $table = 'order_lines';

    protected $fillable = [
        'id',
        'order_id',
        'order_line_num',
        'issue_date',
        'deleted'
    ];

    public function orders(){
       return $this -> belongsTo(Order::class, 'order_id');
    }

    public function delivery_note_line(){
       return $this -> hasMany(DeliveryNoteLine::class, 'order_line_id');
    }

    public function contain_art_orderline(){
       return $this -> hasMany(ContainArtOrderline::class, 'order_line_id');
    }
}
