<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siparis extends Model
{
    use HasFactory;
    protected $table = 'siparises';
    protected $fillable= ['yazici_model','yazici_seri_no','usb_kablo','power_kablo','ariza','aciklama','sonuc','fiyat','musteri_id'];
}
