<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Kasadefteri;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use mysqli;
use PhpParser\Node\Stmt\Foreach_;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class KasadefteriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * //@return \Illuminate\Http\Response
     */
    public function index()
    {


        $kayitlar = DB::table('kasadefteri')
            ->whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])
            ->orderBy('created_at', 'desc')
            ->get();


        return view('kasadefteri.index', ['kayitlar' => $kayitlar, 'metin' => 'Günlük Tablo']);


    }
    public function index_weekly()
    {
        $kayitlar = DB::table('kasadefteri')
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->orderBy('created_at', 'desc')
            ->get();
        foreach ($kayitlar as $kayit) {
            $kayit->created_at = Str::substr($kayit->created_at, 0, 10);
        }
        $startOfWeek=substr(Carbon::now()->startOfWeek(),0,10);
        $endOfWeek=substr(Carbon::now()->endOfWeek(),0,10);
        $tarihBilgisi="Bu hafta olarak gösterilen kayıtlar ".$startOfWeek." ile ".$endOfWeek." tarihleri arasındaki kayıtları kapsar.";


        return view('kasadefteri.all_record', ['kayitlar' => $kayitlar, 'metin' => 'Haftalık Tablo','tarihBilgisi' =>$tarihBilgisi]);

    }
    public function index_daily()
    {
        $kayitlar = DB::table('kasadefteri')
            ->whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])
            ->orderBy('created_at', 'desc')
            ->get();
        foreach ($kayitlar as $kayit) {
            $kayit->created_at = Str::substr($kayit->created_at, 0, 10);
        }
        $startOfDay=substr(Carbon::now()->startOfDay(),0,10);
        $tarihBilgisi=$startOfDay." içerisindeki kayıtları kapsar.";
        return view('kasadefteri.all_record', [
            'kayitlar' => $kayitlar,
             'metin' => 'Günlük Tablo',
             'tarihBilgisi' =>$tarihBilgisi
             

        ]);

    }
    public function index_monthly()
    {

        $kayitlar = DB::table('kasadefteri')
            ->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
            ->orderBy('created_at', 'desc')
            ->get();
        $startOfMonth=substr(Carbon::now()->startOfMonth(),0,10);
        $endOfMonth=substr(Carbon::now()->endOfMonth(),0,10);
        $tarihBilgisi="Bu ay olarak gösterilen kayıtlar ".$startOfMonth." ile ".$endOfMonth." tarihleri arasındaki kayıtları kapsar.";
        
        foreach ($kayitlar as $kayit) {
            $kayit->created_at = Str::substr($kayit->created_at, 0, 10);
        }

        return view('kasadefteri.all_record', [
            'kayitlar' => $kayitlar, 
            'metin' => 'Aylık Tablo',
            'tarihBilgisi' =>$tarihBilgisi
            
    ]);

    }
    public function index_yearly()
    {

        $kayitlar = DB::table('kasadefteri')
            ->whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])
            ->orderBy('created_at', 'desc')
            ->get();

        foreach ($kayitlar as $kayit) {
            $kayit->created_at = Str::substr($kayit->created_at, 0, 10);
        }
        $startOfYear=substr(Carbon::now()->startOfDay(),0,4);
        $tarihBilgisi=$startOfYear." yılı içerisindeki kayıtları kapsar.";
        return view('kasadefteri.all_record', ['kayitlar' => $kayitlar, 'metin' => 'Yıllık Tablo','tarihBilgisi' =>$tarihBilgisi]);

    }


  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fiyat' => 'required',
            'aciklama' => 'required',

        ], [
                'fiyat.required' => 'Fiyat bilgisini giriniz.',
                'aciklama.required' => 'Gelir yada Gider eklemek için açıklama bilgisini giriniz.'

            ]);


        $kasadefteri = new Kasadefteri;

        $kasadefteri->aciklama = $request->get('aciklama');
        $kasadefteri->islem = $request->get('gelirgider');
        if ($kasadefteri->islem == 'gider') {
            $kasadefteri->fiyat = -$request->get('fiyat');
        } else {
            $kasadefteri->fiyat = $request->get('fiyat');

        }
        
        $kasadefteri->odeme_sekli=$request->get("odeme_sekli");
        $kasadefteri->from=$request->get("from");


        $kasadefteri->save();

        return redirect()->route('kasadefteri.index');
        
    }

   

 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //alacak defterindeki siparisler, tahsil edilip 
        //kasadefterine kayıt edildiklerinde kaydı silme işlemi yapılmaz.
        $kayit = Kasadefteri::find($id);
        if($kayit->from =="siparis"){
            return Redirect::back()->with('fail','Kayıt işlemi Alacak defteri üzerinden yapıldığı için silme işlemi yapamazsınız.');

        }else{
            $kayit->delete();
            return Redirect::back()->with('success','Silme işlemi başarılı');
        }
       

    }
    public function detail_of_years(){
        $now=Carbon::now();
        // $servername='localhost';
        // $username='root';
        // $password='';
        // $dbname='treetone_treetoner';

        // $conn=new mysqli($servername,$username,$password,$dbname);
        // $sql='select * from kasadefteri';
        // $result=$conn->query($sql);
        // $gelir_toplam=[];
        // $gider_toplam=[];
        // $kalan=[];
        $aylar=[1=>'Ocak',
                2=>'Şubat',
                3=>'Mart',
                4=>'Nisan',
                5=>'Mayıs',
                6=>'Haziran',
                7=>'Temmuz',
                8=>'Ağustos',
                9=>'Eylül',
                10=>'Ekim',
                11=>'Kasım',
                12=>'Aralık'];
       

        for ($i=0; $i < 12; $i++) { 
            $data = DB::table('kasadefteri')
            ->whereMonth('created_at','=',($i+1))   
            ->where('islem','=','gelir')   
            ->sum('fiyat');
            $gelir_toplam[$i][$i]=$data;

        }
        for ($i=0; $i < 12; $i++) { 
            $data = DB::table('kasadefteri')
            ->whereMonth('created_at','=',$i+1)   
            ->where('islem','=','gider')   
            ->sum('fiyat');
            $gider_toplam[$i][$i]=$data;


        }

        for ($i=0; $i < 12; $i++) { 
            $data = DB::table('kasadefteri')
            ->whereMonth('created_at','=',$i+1)   
            ->sum('fiyat');
            $kalan[$i][$i]=$data;


        }
        $toplamKalan=0;
        $tumGelir=0;
        $tumGider=0;
        for ($i=0; $i < 12; $i++) { 
            $toplamKalan+=$kalan[$i][$i];
            $tumGelir+=$gelir_toplam[$i][$i];
            $tumGider+=$gider_toplam[$i][$i];

        }
       
        return view('kasadefteri.detail_of_year')->with(['gelir'=>$gelir_toplam,
                                                'gider'=>$gider_toplam,
                                                'kalan'=>$kalan,
                                                'aylar'=>$aylar,
                                                'toplamKalan'=>$toplamKalan,
                                                'toplamGelir'=>$tumGelir,
                                                'toplamGider'=>$tumGider
                                                ]
                                                
                                            );
      
    }
}