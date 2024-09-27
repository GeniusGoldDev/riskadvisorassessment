<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function consumer() {
        return $this->belongsTo(Consumer::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class, 'submission_product');
    }
}
