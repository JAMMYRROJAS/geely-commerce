<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'user_id',
        'receipt_date',
        'total',
    ];

    // Relaciones
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }

    public function receiptDetails() {
        return $this->hasMany(ReceiptDetails::class);
    }

    //Actualizar stock
    public function upd_stock($id, $quantity) {
        $product = Product::find($id);
        $product->add_stock($quantity);
    }
}
