<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'review_rating', 'review_title', 'review_text', 'image', 'approved', 'cake_id'];

    public function cake()
    {
        return $this->belongsTo(Cake::class);
    }
}
