<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Kasadefteri;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Foreach_;

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



        return view('kasadefteri.all_record', ['kayitlar' => $kayitlar, 'metin' => 'Haftalık Tablo']);

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


        return view('kasadefteri.all_record', ['kayitlar' => $kayitlar, 'metin' => 'Günlük Tablo']);

    }
    public function index_monthly()
    {

        $kayitlar = DB::table('kasadefteri')
            ->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
            ->orderBy('created_at', 'desc')
            ->get();

        foreach ($kayitlar as $kayit) {
            $kayit->created_at = Str::substr($kayit->created_at, 0, 10);
        }

        return view('kasadefteri.all_record', ['kayitlar' => $kayitlar, 'metin' => 'Aylık Tablo']);

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

        return view('kasadefteri.all_record', ['kayitlar' => $kayitlar, 'metin' => 'Yıllık Tablo']);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'create';

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
            'fiyat' => 'required|integer',
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



        $kasadefteri->save();

        return redirect()->route('kasadefteri.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $kayit = Kasadefteri::find($id);
        $kayit->delete();
        return Redirect::back();

    }
}