<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumer extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function submissions() {
        return $this->hasMany(Submission::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'submission_product');
    }
}
