<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musteri extends Model
{
    use HasFactory;
    protected $table = 'musteries';
    protected $fillable= ['kurum_adi','adi_soyadi','telefon_1','telefon_2','mail','adres'];
}
