<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'phone', 'email', 'zipcode', 'city', 'address', 'shipping_at', 'comment', 'cake_id'];

    public function cake()
    {
        return $this->belongsTo(Cake::class);
    }
}
