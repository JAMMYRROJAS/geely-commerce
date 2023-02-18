<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiptDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'receipt_id',
        'product_id',
        'quantity',
        'price',
    ];

    // Relaciones
    public function receipt() {
        return $this->belongsTo(Receipt::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
