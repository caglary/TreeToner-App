@extends('layouts.app')
@section('content')
    @include('common.alert')
   
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header card-title" style="text-align: center">
                    <strong>Kasa Defteri</strong>
                </div>
            </div>
        </div>
        <div style="margin:3%">
            <a class="btn btn-outline-success" href="/kasadefteri" style="text-align:left;" role="button">Günlük İşlemler</a>
            @if (auth::user()->id == 1)
            <a class="btn btn-outline-success" href="/kasadefteri_daily" style="text-align:left;" role="button">Tüm Kayıtlar</a>
            @endif
        </div>

        <div class="btn-group">
            <a href="/kasadefteri_daily" class="btn btn-secondary" aria-current="page">Bugün</a>
            <a href="/kasadefteri_weekly" class="btn btn-secondary">Bu Hafta</a>
            <a href="/kasadefteri_monthly" class="btn btn-secondary">Bu Ay</a>
            <a href="/kasadefteri_yearly" class="btn btn-secondary">Bu Yıl</a>

        </div>

        <div>


            @php
                $toplam = 0;
                foreach ($kayitlar as $kayit) {
                    $toplam += $kayit->fiyat;
                }
                
                echo '<h3 style="text-align: center;margin:1%;">' . $metin . ' ( ' . $toplam . ' TL )</h3>';
                
                    //Fiyatın eksi yada artı olmasına göre mesaj vermek için yazılmıştı
                    // if($toplam<0){
                    //     echo '<h6 style="text-align: center;">Zarardasın! Allah yardımcın olsun Patron. :)</h6>';
                    // }
                    // if($toplam==0){
                    //     echo '<h6 style="text-align: center;">Tebrikler! En azından zararda değilsin Patron.</h6>';
                    // }
                    // if($toplam>0){
                    //     echo '<h6 style="text-align: center;">Helal olsun Patron!</h6>';
                    // }
            @endphp

        </div>
        {{-- Tablo --}}

        <div class="card-body" style="padding: 2%">

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Tarih</th>
                        <th>Açıklama</th>
                        <th>Fiyat</th>
                        <th></th>



                    </tr>
                </thead>
                <tbody>
                    @foreach ($kayitlar as $kayit)
                        <tr>
                            <th>{{ $kayit->created_at }} </th>
                            <th>{{ $kayit->aciklama }}</th>
                            @if ($kayit->islem == 'gelir')
                                <th style="background-color: rgb(136, 180, 136);color:white;">+ {{ $kayit->fiyat }}</th>
                            @else
                                <th>{{ $kayit->fiyat }}</th>
                            @endif
                            <th>
                                <form action="/kayitsil/{{ $kayit->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-squre btn-outline-danger" type="submit"
                                        onclick="return confirm('Kaydı silmek istediğinizden emin misiniz? Evet-(OK) Hayır-(Cancel)')">Kaydı
                                        Sil</button>

                                </form>
                            </th>
                        </tr>
                    @endforeach


                </tbody>

            </table>
        </div>
    </div>
@endsection
