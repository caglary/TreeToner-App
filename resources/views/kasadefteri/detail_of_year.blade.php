@extends('layouts.app')
@include('common.icons')

@section('content')

@include('common.alert')

<div class="row justify-content-center">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header card-title" style="text-align: center">
                <strong>{{ icon_select('kasadefteri') }} Kasa Defteri</strong>
            </div>
        </div>
    </div>
    <div style="margin:3%">
        <a class="btn btn-outline-success" href="/kasadefteri" style="text-align:left;"
            role="button">{{ icon_select('gunluk-islemler') }} Günlük İşlemler</a>
        @if (auth::user()->id == 1)
            <a class="btn btn-outline-success" href="/kasadefteri_daily" style="text-align:left;"
                role="button">{{ icon_select('tum-kayitlar') }} Tüm Kayıtlar</a>
        @endif
    </div>

    <div class="btn-group">
        <a href="/kasadefteri_daily" class="btn btn-secondary" aria-current="page">{{ icon_select('bugun') }} Bugün</a>
        <a href="/kasadefteri_weekly" class="btn btn-secondary">{{ icon_select('bu-hafta') }} Bu Hafta</a>
        <a href="/kasadefteri_monthly" class="btn btn-secondary">{{ icon_select('bu-ay') }} Bu Ay</a>
        <a href="/kasadefteri_yearly" class="btn btn-secondary">{{ icon_select('bu-yil') }} Bu Yıl</a>
        <a href="/detail_of_year" class="btn btn-secondary">Yıllık Rapor</a>


    </div>

    


     {{-- Özet Kar gösteren tablo --}}
       
             <table class="table">
                 <thead >
                     <th></th>
                     <th>Toplam Gelir</th>
                     <th>Toplam Gider</th>
                     <th>Toplam Kar</th>
 
                 </thead>
                 <tbody>
                    @for ($i = 0; $i < 12; $i++)
                @php
                    $ay=(string)($i+1);
                @endphp
                    <tr>
                        
                        <th>{{$aylar[$ay]}}</th>
                        <th>{{number_format($gelir[$i][$i],2,',','.')}} TL</th>
                        <th>{{number_format($gider[$i][$i],2,',','.')}} TL</th>
                        <th>{{number_format($kalan[$i][$i],2,',','.')}} TL</th>
                        


                    </tr>
                    @endfor
            
                    
                 </tbody>
                 <tfoot>
                    <th>TOPLAM</th>
                    <th>{{number_format($toplamGelir,2,',','.')}} TL</th>
                    <th>{{number_format($toplamGider,2,',','.')}} TL</th>
                    <th>{{number_format($toplamKalan,2,',','.')}} TL</th>
                


                 </tfoot>
             </table>
    @endsection
             