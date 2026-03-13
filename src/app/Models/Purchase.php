<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
    'user_id',
    'item_id',
    'payment_method',
    'shipping_postcode',
    'shipping_address',
    'shipping_name',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }


}
