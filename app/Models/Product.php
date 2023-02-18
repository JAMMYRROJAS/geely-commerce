<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'large_description',
        'small_description',
        'stock',
        'image',
        'sell_price',
        'status',
        'category_id',
        'supplier_id',
    ];

    //Aumentar o disminuuir stock
    public function add_stock($quantity){
        $this->increment('stock', $quantity);
    }

    public function sub_stock($quantity){
        $this->decrement('stock', $quantity);
    }

    // Relaciones
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}
