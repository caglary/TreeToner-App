<?php

namespace App\Http\Controllers;



use App\Models\Kasadefteri;
use App\Models\Musteri;
use App\Models\Siparis;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Dompdf\Dompdf;

use Illuminate\Http\Request;
use Illuminate\Mail\Attachment;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

/**
 * Summary of SiparisController
 */
class SiparisController extends Controller
{
    /**
     * Summary of __construct
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Summary of index
     * @param mixed $musteri_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index($musteri_id)
    {

        $musteri = Musteri::find($musteri_id);
        $siparisler = DB::table('siparises')->where('musteri_id', $musteri_id)->get();
        if (count($siparisler) == 0) {
            return view('treetoner.siparisler.index', ['musteri_id' => $musteri_id, 'musteri' => $musteri]);
        } else {
            return view('treetoner.siparisler.index', [
                'siparisler' => $siparisler,
                'musteri_id' => $musteri_id,
                'musteri' => $musteri
            ]);
        }




    }
    /**
     * Summary of create
     * @param mixed $musteri_id
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function create($musteri_id)
    {

        return view('treetoner.siparisler.create')
            ->with('musteri_id', $musteri_id);
    }

    /**
     * Summary of store
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fiyat' => 'required',
            'yazici_model' => 'required',

        ], [
                'fiyat.required' => 'fiyat bilgisini giriniz.',
                'yazici_model.required' => 'Yazıcı Model bilgisini giriniz.'

            ]);


        $siparis = new Siparis;
        $siparis->yazici_model = $request->get('yazici_model');
        $siparis->yazici_seri_no = $request->get('yazici_seri_no');
        if ($request->get('usb_kablo') == null) {
            $siparis->usb_kablo = 'yok';
        } else {
            $siparis->usb_kablo = 'var';
        }

        if ($request->get('power_kablo') == null) {
            $siparis->power_kablo = 'yok';
        } else {
            $siparis->power_kablo = 'var';
        }

        $siparis->ariza = $request->get('ariza');
        $siparis->aciklama = $request->get('aciklama');
        $siparis->sonuc = $request->get('sonuc');
        $siparis->fiyat = $request->get('fiyat');
        $siparis->musteri_id = $request->get('musteri_id');
        $siparis->tahsilat = "money_wait";
        $siparis->save();


        return redirect()->route('siparis.index', ['musteri_id' => $siparis->musteri_id]);
    }

    /**
     * Summary of show
     * @param mixed $siparis_id
     * @param mixed $musteri_id
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function show($siparis_id, $musteri_id)
    {
        $siparis = Siparis::find($siparis_id);
        return view('treetoner.siparisler.show', ['siparis_id' => $siparis_id, 'musteri_id' => $musteri_id])->with('siparis', $siparis);
    }
    /**
     * Summary of update
     * @param mixed $siparis_id
     * @param mixed $musteri_id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function update($siparis_id, $musteri_id, Request $request)
    {
        $siparis = Siparis::find($siparis_id);
        $siparis->yazici_model = $request->get('yazici_model');
        $siparis->yazici_seri_no = $request->get('yazici_seri_no');
        $siparis->ariza = $request->get('ariza');
        $siparis->aciklama = $request->get('aciklama');
        $siparis->sonuc = $request->get('sonuc');
        $siparis->fiyat = $request->get('fiyat');
        if ($request->get('usb_kablo') != null) {
            $siparis->usb_kablo = "var";
        } else {
            $siparis->usb_kablo = "yok";

        }
        if ($request->get('power_kablo') != null) {
            $siparis->power_kablo = "var";
        } else {
            $siparis->power_kablo = "yok";

        }

        if ($siparis->tahsilat == "money_paid") {


            return redirect()->route('siparis.index', ['musteri_id' => $siparis->musteri_id])->with('fail', 'sipariş kasa defterine işlendiğinden güncelleme yapılamaz.');

        } else {
            $siparis->save();

            return redirect()->route('siparis.index', ['musteri_id' => $siparis->musteri_id]);
        }

    }
    /**
     * Summary of destroy
     * @param mixed $siparis_id
     * @param mixed $musteri_id
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function destroy($siparis_id, $musteri_id)
    {

        $siparis = Siparis::find($siparis_id);
        if ($siparis->tahsilat == "money_paid") {
            return redirect()->route('siparis.index', ['musteri_id' => $musteri_id])->with('fail', 'kasadefterine kaydı yapıldığı için siparişi silemezsiniz.');

        }
        if ($siparis->tahsilat == "money_return") {
            $siparis->delete();
            return redirect()->route('siparis.index', ['musteri_id' => $musteri_id]);
        }
        if ($siparis->tahsilat == "money_wait") {
            $siparis->delete();
            return redirect()->route('siparis.index', ['musteri_id' => $musteri_id]);
        }



    }
    /**
     * Summary of siparis_goster
     * @param mixed $siparis_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function siparis_goster($siparis_id)
    {
        $siparis = Siparis::find($siparis_id);
        return view('treetoner.siparisler.siparis_goster', ['siparis' => $siparis]);



    }

    /**
     * Summary of tahsilatlar
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function tahsilatlar()
    {
        //$siparisler = Siparis::where('tahsilat', '!=', 'money_paid')->get();
        $siparisler = DB::table('siparises')
            ->join('musteries', 'siparises.musteri_id', '=', 'musteries.id')
            ->select('musteries.adi_soyadi', 'siparises.yazici_model', 'siparises.ariza', 'siparises.fiyat', 'siparises.id')
            ->where('siparises.tahsilat', '!=', 'money_paid')
            ->get();

        return view('treetoner.tahsilatlar.index', ['siparisler' => $siparisler]);
    }
    /**
     * Summary of tahsilat
     * @param mixed $from
     * @param mixed $odeme_sekli
     * @param mixed $siparis_id
     * @param mixed $odeme_durumu
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function tahsilat($from, $odeme_sekli, $siparis_id, $odeme_durumu)
    {

        //odeme_sekli değişkeni ne ile ödendiğini belirtir.Kasadefteri veritabanına
        //ödeme sekli kolonuna kayıt yapılır.

        //ödeme_durumu ise paranın tahsil edilip edilemediği hakkında bilgi verir ve siparişler tablosunda 
        //tahsilat kısmına kayıt edilir.

        //from işlemin siparisler üzerinden veya kasadefteri üzerinden yapıldığını belirtir.

        $siparis = Siparis::find($siparis_id);
        $siparis->tahsilat = $odeme_durumu;
        $siparis->save();


        //ödemesi yapılan tahsilat kasa defterine atılacak...
        if ($odeme_durumu == 'money_paid') {
            $kasadefteri_kayit = new Kasadefteri;
            $musteri = Musteri::find($siparis->musteri_id);
            if ($siparis->yazici_model == "") {
                $kasadefteri_kayit->aciklama = $musteri->adi_soyadi . " isimli müşterinin Yazıcı Tamir/Bakım ücreti (" . $siparis->yazıcı_model . ")";
            } else {
                $kasadefteri_kayit->aciklama = $musteri->adi_soyadi . " isimli müşterinin Yazıcı Tamir/Bakım ücreti";
            }
            $kasadefteri_kayit->fiyat = $siparis->fiyat;
            $kasadefteri_kayit->odeme_sekli = $odeme_sekli;
            //from nereden kayıt yapıldığını belirtir.
            $kasadefteri_kayit->from = $from;
            $kasadefteri_kayit->save();
        }

        $siparisler = Siparis::where('tahsilat', '!=', 'money_paid')
            ->where('tahsilat', '!=', 'money_return')
            ->get();
        return view('treetoner.tahsilatlar.index', ['siparisler' => $siparisler]);


    }
    /**
     * Summary of odeme_sekli_degistir
     * @param mixed $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function odeme_sekli_degistir($id, Request $request)
    {


        //kasadefterinde odeme_sekli kolonunda değişikliği belirtir.

        $kayit = Kasadefteri::find($id);
        $kayit->odeme_sekli = $request->get('odeme_sekli');
        $kayit->save();
        return redirect()->back();
    }

    /**
     * Summary of siparis_detay_pdf
     * @param mixed $id
     * @return \Illuminate\Http\Response
     */
    //siparişlerin müşteri bilgisi ile birlikte pdf çıktısını aldığımız fonksiyon
    public function siparis_detay_pdf($id)
    {

        try {
            $siparis = Siparis::find($id);
            $musteri = Musteri::find($siparis->musteri_id);

            $html = '
            <?php require_once "vendor/autoload.php";?>
            <!doctype html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   
    <style>
        body {
            font-family: firefly, DejaVu Sans, sans-serif;
           font-size:12px;
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


    <h3 class="margin">TREETONER</h3>

    <h6 class="margin">
        <i><small>
            TONER VE KARTUŞ DOLUM MERKEZİ <br>
            ETİLER CADDESİ NO:36/A 
            ETİMESGUT/ANKARA <br>
            TELEFON : 0312 244 91 61 
            MOBİL : 0546 244 91 61</small>
    </h6></i>
    <hr>
    <u><strong>Müşteri Bilgisi</strong></u><br>
    <div style="margin:10px;">
    Kurum Adı : ' . $musteri->kurum_adi . ' <br>
    İsim Soysim : ' . $musteri->adi_soyadi . ' <br>
    Cep Telefonu : ' . $musteri->telefon_1 . ' <br>
    İş Telefonu : ' . $musteri->telefon_2 . ' <br>
    Adres : ' . $musteri->adi_soyadi . ' <br>
    </div>
    
    <u><strong>Sipariş Bilgisi</strong></u><br>
<div style="margin:10px;">
    <table style="font-family: firefly, DejaVu Sans, sans-serif;">
        <tr>
            <td><label>Yazıcı Modeli :</label></td>
            <td><label><strong>' . $siparis["yazici_model"] . '</strong></label>
            <td>
        </tr>
        <tr>
            <td><label>Yazıcı Seri No :</label></td>
            <td><label><strong>' . $siparis["yazici_seri_no"] . '</strong></label>
            <td>
        </tr>
        <tr>
            <td><label>Usb Kablo :</label></td>
            <td><label><strong>' . $siparis["usb_kablo"] . '</strong></label>
            <td>
        </tr>
        <tr>
            <td><label>Power Kablosu :</label></td>
            <td><label ><strong>' . $siparis["power_kablo"] . '</strong></label>
            <td>
        </tr>

    </table></div>
    <div style="margin:10px;">
    <table>
        <tr>
            <td><label>Arıza :</label><br>
                <textarea name="" style="font-family: firefly, DejaVu Sans, sans-serif;" id="textarea" cols="300" rows="100">' . $siparis['ariza'] . '</textarea>
            <td>
        </tr>
        <tr>
            <td><label>Açıklama :</label><br>
                <textarea name="" style="font-family: firefly, DejaVu Sans, sans-serif;" id="textarea" cols="300" rows="100">' . $siparis['aciklama'] . '</textarea>
            <td>
        </tr>
        <tr>
            <td><label>Sonuç :</label><br>
                <textarea name="" style="font-family: firefly, DejaVu Sans, sans-serif;" id="textarea" cols="300" rows="100">' . $siparis['sonuc'] . '</textarea>
            <td>
        </tr>

    </table></div>
    <div style="padding:3%;">
    <table>
        <tr>
            <td><label>Fiyat :</label></td>
            <td><label style="font-family: firefly, DejaVu Sans, sans-serif;" >' . $siparis['fiyat'] . ' TL</label>
            <td>
        </tr>
        
    </table>

    <table>
    <tr>
    <td> <i>Bizi seçtiğiniz için teşekkür eder, iyi günler dileriz.</i>
    </td>
    </tr>
    </table>
        </div>


    </div>

   


</body>

</html>';

            // instantiate and use the dompdf class
            $dompdf = new Dompdf();

            $dompdf->loadHtml($html);


            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'potroit');

            // Render the HTML as PDF
            $dompdf->render();

            // Output the generated PDF to Browser
            return $dompdf->stream($musteri->adi_soyadi . '.pdf', array("Attachment" => (0)));


        } catch (\Throwable $th) {
            return redirect()->back();
        }


    }

    //Sipariş Sorgu İşlemleri 
    public function tum_siparisler()
    {
        $siparisler = DB::table('siparises')
            ->join('musteries', 'musteries.id', '=', 'siparises.musteri_id')
            ->select('siparises.*', 'musteries.adi_soyadi')
            ->get();
        return view('treetoner.siparis_sorgu.index', [
            'siparisler' => $siparisler ]);
    }

    public function benzer_siparis_olustur($id){
        $siparis= Siparis::find($id);
        $musteri= Musteri::find($siparis->musteri_id);
        return view('treetoner.siparis_sorgu.benzer_siparis')->with(['siparis'=>$siparis,'musteri'=>$musteri]);
    }
}