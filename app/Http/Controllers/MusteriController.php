<?php

namespace App\Http\Controllers;

use Validator;


use App\Models\Musteri;
use App\Models\Siparis;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class MusteriController extends Controller
{

    public function index(){
        $musteries=DB::table('musteries')->orderby('created_at','desc')->get();
        return view('treetoner.musteri.index',compact('musteries'));
    }
    public function validate_musteri(Request $request)
    {
        $validated = $request->validate([
            'adi_soyadi' => 'required',
            'is_telefonu' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|max:14',
            'cep_telefonu' => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|max:14',

        ], [
                'adi_soyadi.required' => 'İsim soyisim bilgisini giriniz.',
                'is_telefonu.numeric' => 'İş Telefonu bilgisini doğru giriniz.',
                'cep_telefonu.numeric' => 'Cep Telefonu bilgisini doğru giriniz.',




            ]);
    }

    public function Store(Request $request)
    {

        $this->validate_musteri($request);



        $musteri = new Musteri;
        $musteri->kurum_adi = $request->get('kurum_adi');
        $musteri->adi_soyadi = $request->get('adi_soyadi');
        $musteri->telefon_1 = $request->get('cep_telefonu');
        $musteri->telefon_2 = $request->get('is_telefonu');
        $musteri->mail = $request->get('mail');
        $musteri->adres = $request->get('adres');
        $musteri->save();

        return redirect('/')->with('success', 'Kayıt işlemi yapılmıştır.');
    }


    public function show($id)
    {
        $musteri = Musteri::find($id);

        abort_if(!isset($musteri), 404);

        return view('treetoner.musteri.show')->with('musteri', $musteri);
    }


    public function delete($id)
    {
        $musteri = Musteri::find($id);
        $siparis = Siparis::where('musteri_id', $id)->first();
        $exists = is_null($siparis);
        if ($exists) {
            $musteri->delete();

            return redirect('/');
        } else {

            return redirect()->action(
                [MusteriController::class, 'show'],
                ['id' => $id]
            )->with('mesaj', "Silmek istediğiniz muşteri için siparişler mevcut. Öncelikle müşteriye ait siparişleri silmelisiniz.");

        }
    }
    public function edit($id)
    {


        $musteri = Musteri::find($id);



        return view('treetoner.musteri.edit')->with('musteri', $musteri);
    }
    public function update(Request $request, $id)
    {

        $this->validate_musteri($request);

        $musteri = Musteri::find($id);

        $musteri->kurum_adi = $request->get('kurum_adi');
        $musteri->adi_soyadi = $request->get('adi_soyadi');
        $musteri->telefon_1 = $request->get('cep_telefonu');
        $musteri->telefon_2 = $request->get('is_telefonu');
        $musteri->mail = $request->get('mail');
        $musteri->adres = $request->get('adres');

        $musteri->save();
        return view('treetoner.musteri.show', compact('musteri'))->with('success', 'Güncelleme işlemi başarılı.');


    }
    public function create()
    {
        return view('treetoner.musteri.create');
    }

/* data table içerisindeki search input kullanıldığı için bu fonksiyona gerek kalmadı. */
/* 
public function search(Request $request)
{
//$text =$request->get('search');
$musteries = Musteri::when($request->search, function ($query, $text) {
//return $query->where('adi_soyadi', $text);
return $query->where('adi_soyadi','like','%'.$text.'%');
})->paginate(10);
return view('treetoner.musteri.index', ['musteries' => $musteries]);

} */
}