<?php
if (!function_exists('icon_select')) {
    function icon_select($key)
    {
        $kutu = array(
            'shopping' => '<i class="fa-solid fa-cart-shopping"></i>',
            'user-edit' => '<i class="fa-solid fa-user-edit"></i>',
            'user-plus' => '<i class="fa-solid fa-user-plus"></i> ',
            'circle-user' => '<i class="fa-solid fa-circle-user"></i>',
            'logout' => '<i class="fa-solid fa-right-from-bracket"></i>',
            'download' => '<i class="fa-solid fa-download"></i>',
            'pen-to-square' => '<i class="fa-solid fa-pen-to-square"></i>',
            
       
            'users' => '<i class="fa-solid fa-users"></i>',
            'face_smile' => '<i class="fa-regular fa-face-smile"></i>',
            'image' => '<i class="fa-regular fa-image"></i>',
            'check' => '<i class="fa-solid fa-check"></i>',
            'comment' => '<i class="fa-regular fa-comment"></i>',
            'trash' => '<i class="fa-solid fa-trash"></i>',
            'eye' => '<i class="fa-regular fa-eye"></i>',
            'credit-card' => '<i class="fa-regular fa-credit-card"></i>',
            'xmark' => '<i class="fa-solid fa-square-xmark"></i>',
            'square-check' => '<i class="fa-solid fa-square-check"></i>',
            'thumbs-up' => '<i class="fa-solid fa-thumbs-up"></i>',
            'cash-register' => '<i class="fa-solid fa-cash-register"></i>',
            'wallet' => '<i class="fa-solid fa-wallet"></i>',
            'sil' => '<i class="fa-solid fa-delete-left"></i>',
            'info' => '<i class="fa fa-circle-info"></i>',
            
            'detail'=>'<i class="fa-sharp fa-solid fa-file-circle-info"></i>',
            'musteri-ekle' => '<i class="fa-solid fa-user-plus"></i> ',
            'iade'=>'<i class="fa-regular fa-eyes"></i>',
            'kart' => '<i class="fa-solid fa-wallet"></i>',
            'eft' => '<i class="fa-duotone fa-money-bill-transfer"></i>',
            'nakit' => '<i class="fa-solid fa-comment-dollar"></i>',
            'siparis-olustur' => '<i class="fa-solid fa-cart-shopping"></i>',
            'kasadefteri'=>'<i class="fa-solid fa-cash-register"></i>',
            'gunluk-islemler'=>'<i class="fa-solid fa-cash-register"></i>',
            'gunluk-toplam'=>'<i class="fa-solid fa-cash-register"></i>',

            'tum-kayitlar'=>'<i class="fa-solid fa-cash-register"></i>',
            'bugun'=>'<i class="fa-solid fa-cash-register"></i>',
            'bu-hafta'=>'<i class="fa-solid fa-cash-register"></i>',
            'bu-ay'=>'<i class="fa-solid fa-cash-register"></i>',
            'bu-yil'=>'<i class="fa-solid fa-cash-register"></i>',
            'temizle'=>'<i class="fa-solid fa-trash"></i>',
            'tarih'=>'',
            'onem-derecesi'=>'',
            'ekle'=>'',
            'not'=>'',
            'cop-kutusu'=>'',
            'gunu-gelenler'=>'',
            'onayla'=>'',
            'bilgi'=>'<i class="fa fa-circle-info"></i>',
            'islem'=>'',
            'guncelle'=>'',
            'geri'=>'<i class="fa-solid fa-share"></i>',
            'kaydet'=>'<i class="fa-solid fa-plus"></i>',
            'musteri-bilgi'=>'<i class="fa fa-circle-info"></i>',
            'odendi'=>'<i class="fa-solid fa-wallet"></i>',
            'odenecek'=>'<i class="fa-solid fa-wallet"></i>',
            'goster'=>'<i class="fa-regular fa-eye"></i>',
            'detay'=>'<i class="fa fa-circle-info"></i>',
            'alacak-defteri'=>'<i class="fa-solid fa-cash-register"></i>',
           











        );
        echo $kutu[$key];
    }
}









?>