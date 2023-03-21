<!doctype html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }

        #textarea {
            background-color: white;
            width: 600px;
            height: 100px;
            border: 1px solid green;
            padding: 5px;
            margin: 5px;
        }

        .margin {
            margin: 1px;
        }
    </style>

</head>

<body>


    <h1 class="margin">TREETONER</h1>

    <h6 class="margin">
        <small>
            TREE TONER VE KARTUŞ DOLUM MERKEZİ <br>
            ETİLER CADDESİ NO:36/A <br>
            ETİMESGUT/ANKARA <br>
            TELEFON : 0312 244 91 61 <br>
            MOBİL : 0546 244 91 61</small>
    </h6>
    <hr>
    <u><strong>Müşteri Bilgisi</strong></u><br>
    Kurum Adı : {{ $musteri->kurum_adi }} <br>
    İsim Soysim : {{ $musteri->adi_soyadi }} <br>
    Cep Telefonu : {{ $musteri->telefon_1 }} <br>
    İş Telefonu : {{ $musteri->telefon_2 }} <br>
    Adres :{{ $musteri->adi_soyadi }} <br>
    <hr>
    <u><strong>Sipariş Bilgisi</strong></u><br>

    <table>
        <tr>
            <td><label>Yazıcı Modeli :</label></td>
            <td><label><strong>{{ $siparis['yazici_model'] }}</strong></label>
            <td>
        </tr>
        <tr>
            <td><label>Yazıcı Seri No :</label></td>
            <td><label><strong>{{ $siparis['yazici_seri_no'] }}</strong></label>
            <td>
        </tr>
        <tr>
            <td><label>Usb Kablo :</label></td>
            <td><label><strong>{{ $siparis['usb_kablo'] }}</strong></label>
            <td>
        </tr>
        <tr>
            <td><label>Power Kablosu :</label></td>
            <td><label><strong>{{ $siparis['power_kablo'] }}</strong></label>
            <td>
        </tr>

    </table>
    <table>
        <tr>
            <td><label>Arıza :</label><br>
                <textarea name="" id="textarea" cols="300" rows="100">{{ $siparis['ariza'] }}</textarea>
            <td>
        </tr>
        <tr>
            <td><label>Açıklama :</label><br>
                <textarea name="" id="textarea" cols="300" rows="100">{{ $siparis['aciklama'] }}</textarea>
            <td>
        </tr>
        <tr>
            <td><label>Sonuç :</label><br>
                <textarea name="" id="textarea" cols="300" rows="100">{{ $siparis['sonuc'] }}</textarea>
            <td>
        </tr>

    </table>
    <table>
        <tr>
            <td><label>Fiyat :</label></td>
            <td><label>{{ $siparis['fiyat'] }} TL</label>
            <td>
        </tr>
    </table>
    <p>Bizi seçtiğiniz için teşekkür ederiz.</p>



    </div>




</body>

</html>
