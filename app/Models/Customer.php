<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable=['name','email','phone','address'];

    public function products()
    {
        return $this->belongsToMany(product::class);
    }

    public function CustomerProduct()
    {
        return $this->hasMany(CustomerProduct::class);
    }
}
