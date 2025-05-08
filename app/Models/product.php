<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    use HasFactory;
    protected $table = 'products';
<<<<<<< HEAD
    protected $fillable = ['name','image','description','price','stok'];

    // untuk mengjooin tabel
    // public function user(): BeLongsTo{
    //     return $this->belongsto(User::class,'foreign_key','other_key')
    // } user terserah dan key asing sesuai dengan nama id join
    
=======
    protected $fillable = ['name','image','description','price'];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
>>>>>>> ea59873 (history)
}
