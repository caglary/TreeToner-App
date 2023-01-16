<?php

namespace App\Http\Controllers;

use Faker\Factory;
use App\Models\Musteri;
use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;

class MusteriController extends Controller
{

    public function __invoke(){
        
        return $this->GetAll();
        
    }
    public function GetAll(){
        $musteries=DB::table('musteries')->orderby('created_at','desc')->get()->take(5);
        return view('treetoner.index',compact('musteries'));
    }
    public function musteriekle(Request $request){
        
        $musteri=new Musteri;
        $musteri->kurum_adi = $request->get('kurum_adi');
        $musteri->adi_soyadi = $request->get('adi_soyadi');
        $musteri->telefon_1 = $request->get('telefon_1');
        $musteri->telefon_2 = $request->get('telefon_2');
        $musteri->mail = $request->get('mail');
        $musteri->adres = $request->get('adres');
        $musteri->save();

        return $this->GetAll();
    }
    public function show($id){
        $musteri=Musteri::find($id);
        
        abort_if(!isset($musteri),404);
        
        return view('treetoner._musteriShow')->with('musteri',$musteri);
    }
    public function delete($id){
        $musteri=Musteri::find($id);
        $musteri->delete();
        return redirect('/');
    }
    public function edit($id){
        $musteri=Musteri::find($id);
        
        return view('treetoner._musteriEdit')->with('musteri',$musteri);
    }
    public function update(Request $request ,$id){
        $musteri=Musteri::find($id);
        
        $musteri->kurum_adi = $request->get('kurum_adi');
        $musteri->adi_soyadi = $request->get('adi_soyadi');
        $musteri->telefon_1 = $request->get('telefon_1');
        $musteri->telefon_2 = $request->get('telefon_2');
        $musteri->mail = $request->get('mail');
        $musteri->adres = $request->get('adres');

        $musteri->save();
        return view('treetoner._musteriShow')->with('musteri',$musteri);
        
        
    }
}
