<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileUnis extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'deskripsi','logo','makna_logo'
    ];
}
