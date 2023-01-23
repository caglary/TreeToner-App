<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kayit extends Model
{
    use HasFactory;
    protected $table = 'kayits';
    protected $fillable= ['yazici_model','yazici_seri_no','usb_kablo','power_kablo','ariza','aciklama','sonuc','fiyat','musteri_id'];
}
