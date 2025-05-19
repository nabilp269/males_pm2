<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_price',
        'status',
        'pesan',
        'alamat_pengiriman',

        'seller_message',  // Tambahkan ini supaya bisa mass assign
        'bukti_pembayaran',
    ];

    // Relasi: Order milik satu User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Order punya banyak OrderItem
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Biasanya Order tidak langsung punya Product,
    // tapi jika kamu memang ingin relasi produk, bisa dihapus jika tidak perlu
    // public function product()
    // {
    //     return $this->belongsTo(Product::class);
    // }
}
