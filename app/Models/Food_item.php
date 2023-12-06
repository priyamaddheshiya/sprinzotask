<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food_item extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'donor_id'];

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }
}
