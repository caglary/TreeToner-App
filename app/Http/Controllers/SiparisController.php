<?php

namespace App\Http\Controllers;



use App\Models\Kasadefteri;
use App\Models\Musteri;
use App\Models\Siparis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SiparisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
    public function create($musteri_id)
    {

        return view('treetoner.siparisler.create')
            ->with('musteri_id', $musteri_id);
    }

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

    public function show($siparis_id, $musteri_id)
    {
        $siparis = Siparis::find($siparis_id);
        return view('treetoner.siparisler.show', ['siparis_id' => $siparis_id, 'musteri_id' => $musteri_id])->with('siparis', $siparis);
    }
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
    public function siparis_goster($siparis_id)
    {
        $siparis = Siparis::find($siparis_id);
        return view('treetoner.siparisler.siparis_goster', ['siparis' => $siparis]);



    }

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
    public function odeme_sekli_degistir($id, Request $request)
    {


        //kasadefterinde odeme_sekli kolonunda değişikliği belirtir.

        $kayit = Kasadefteri::find($id);
        $kayit->odeme_sekli=$request->get('odeme_sekli');
        $kayit->save();
        return redirect()->back();
    }



}