<?php

namespace App\Http\Controllers;

use App\Models\Kasadefteri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class KasadefteriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kayitlar = DB::table('kasadefteri')
            ->whereDate('created_at', '=', now()->format('Y-m-d'))
            ->orderBy('created_at', 'desc')
            ->get();

        
       
        return view('kasadefteri.index',['kayitlar'=>$kayitlar]);
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
                'aciklama.required' => 'Gelir bilgisini giriniz.'

            ]);


        $kasadefteri = new Kasadefteri;
        
        $kasadefteri->aciklama = $request->get('aciklama');
        $kasadefteri->islem=$request->get('gelirgider');
        if($kasadefteri->islem=='gider'){
            $kasadefteri->fiyat = -$request->get('fiyat');
        }else{
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
