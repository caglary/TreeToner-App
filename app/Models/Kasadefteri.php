<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasadefteri extends Model
{
    use HasFactory;
    protected $table = 'kasadefteri';
    protected $fillable= ['aciklama','fiyat','islem'];
}
