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
        @if (auth::user()->id == 1)
            <div style="margin:3%">
                <a class="btn btn-outline-success" href="/kasadefteri" style="text-align:left;" role="button">Günlük
                    İşlemler</a>

                <a class="btn btn-outline-success" href="/kasadefteri_daily" style="text-align:left;" role="button">Tüm
                    Kayıtlar</a>

            </div>
        @endif
        {{-- Gelir Card --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Gelir Ekleme
                </div>
                <div class="card-body ">

                    <form action="/gelirgider" method="post">
                        @csrf
                        <input type="text" name="from" value="kasadefteri" hidden>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Açıklama</label>
                            <textarea class="form-control" name="aciklama" rows="3"></textarea>
                        </div>
                        <div class="input-group col-md-13 mb-3">
                            <span class="input-group-text" >Fiyat</span>
                            <input type="number" name="fiyat" Step=".01" 
                                class="form-control">
                            <input hidden name="gelirgider" value="gelir">
                        </div>
                        <div class="card-body">
                            <h6>Ödeme Yöntemini Seçiniz</h6>
                            <div class="form-check">
                                <input value="nakit" class="form-check-input" type="radio" name="odeme_sekli"
                                    id="flexRadioDefault1" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Nakit
                                </label>
                            </div>
                            <div class="form-check">
                                <input value="card" class="form-check-input" type="radio" name="odeme_sekli"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Kart
                                </label>
                            </div>
                            <div class="form-check">
                                <input value="eft" class="form-check-input" type="radio" name="odeme_sekli"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Eft
                                </label>
                            </div>
                        </div>
                          <div style="text-align: center" >
                            <input type="submit" value="Gelir Ekle" class="btn btn-sm btn-success">

                          </div>


                    </form>

                </div>

            </div>
        </div>
        {{-- Gider Card --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Gider Ekleme
                </div>
                <div class="card-body ">
                    <form action="/gelirgider" method="post">
                        @csrf
                        <input type="text" name="from" value="kasadefteri" hidden>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Açıklama</label>
                            <textarea class="form-control" name="aciklama" rows="3"></textarea>
                        </div>
                        <div class="input-group col-md-13 mb-3">
                            <span class="input-group-text">Fiyat</span>
                            <input type="number" Step=".01" name="fiyat" class="form-control">
                            <input hidden name="gelirgider" value="gider">

                        </div>

                        <div class="card-body">
                            <h6>Ödeme Yöntemini Seçiniz</h6>
                            <div class="form-check">
                                <input value="nakit" class="form-check-input" type="radio" name="odeme_sekli"
                                    id="flexRadioDefault1" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Nakit
                                </label>
                            </div>
                            <div class="form-check">
                                <input value="card" class="form-check-input" type="radio" name="odeme_sekli"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Kart
                                </label>
                            </div>
                            <div class="form-check">
                                <input value="eft" class="form-check-input" type="radio" name="odeme_sekli"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Eft
                                </label>
                            </div>
                        </div>
                          <div style="text-align: center" >
                            <input type="submit" value="Gider Ekle" class="btn btn-sm btn-danger">

                          </div>
                       



                    </form>
                </div>
            </div>
        </div>
        {{-- Toplam Card --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Günlük Toplam
                </div>
                <div class="card-body ">
                    <div style="text-align: center">

                        @php
                            $toplam = 0;
                            foreach ($kayitlar as $kayit) {
                                $toplam += $kayit->fiyat;
                            }
                            
                            echo '<h1>' . $toplam . ' TL</h1>';
                        @endphp


                    </div>

                    </form>
                </div>
            </div>

        </div>

        {{-- Tablo --}}
        <div class="card-body" style="padding: 2%">

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>

                        <th>Açıklama</th>
                        <th>Fiyat</th>
                        <th>Ödeme Şekli</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kayitlar as $kayit)
                        <tr>

                            <th>{{ $kayit->aciklama }}</th>
                            @if ($kayit->islem == 'gelir')
                                <th style="background-color: rgb(136, 180, 136);color:white;">+ {{ $kayit->fiyat }}</th>
                            @else
                                <th>{{ $kayit->fiyat }}</th>
                            @endif
                            <th>
                            @if ($kayit->odeme_sekli=="card")
                                Kart
                            @else
                            {{$kayit->odeme_sekli}}
                            @endif    
                            
                            </th>

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
