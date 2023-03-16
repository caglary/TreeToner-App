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
                            <textarea class="form-control" name="aciklama" rows="3">{{ old('aciklama') }}</textarea>
                        </div>
                        <div class="input-group col-md-13 mb-3">
                            <span class="input-group-text">Fiyat</span>
                            <input type="number" name="fiyat" Step=".01" value="{{ old('fiyat') }}"
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
                                <input value="Kart" class="form-check-input" type="radio" name="odeme_sekli"
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
                        <div style="text-align: center">
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
                            <textarea class="form-control" name="aciklama" rows="3">{{ old('aciklama') }}</textarea>
                        </div>
                        <div class="input-group col-md-13 mb-3">
                            <span class="input-group-text">Fiyat</span>
                            <input type="number" Step=".01" value="{{ old('fiyat') }}" name="fiyat"
                                class="form-control">
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
                                <input value="Kart" class="form-check-input" type="radio" name="odeme_sekli"
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
                        <div style="text-align: center">
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


                                <form method="POST" action="/odeme_sekli_degistir/{{$kayit->id}}">
                                    @csrf
                                    <div class="dropup">
                                        <button class="dropbtn">{{ $kayit->odeme_sekli }}</button>
                                        <div class="dropup-content">
                                            <button class="btn btn-sm btn-outline-warning" name="odeme_sekli" value="Kart" type="submit">Kart</button>
                                            <button class="btn btn-sm btn-outline-warning" name="odeme_sekli" value="Eft" type="submit">Eft</button>
                                            <button class="btn btn-sm btn-outline-warning" name="odeme_sekli" value="Nakit" type="submit">Nakit</button>

                                        </div>
                                    </div>
                                </form>

                                {{-- Css Kodları --}}
                                <style>
                                    /* Dropup Button */
                                    .dropbtn {
                                        background-color: #094c73;
                                        color: white;
                                        padding: 5px;
                                        font-size: 12px;
                                        border: 1px solid red;
                                        border-radius: 5px;

                                    }

                                    /* The container <div> - needed to position the dropup content */
                                    .dropup {
                                        position: relative;
                                        left: 20px;
                                        top: 1px;

                                        display: inline-block;
                                    }

                                    /* Dropup content (Hidden by Default) */
                                    .dropup-content {
                                        display: none;
                                        position: absolute;
                                        bottom: 10px;
                                        background-color: #f1f1f1;
                                        min-width: 80px;
                                        box-shadow: 0px 8px 8px 0px rgba(0, 0, 0, 0.2);
                                        z-index: 1;
                                    }

                                    /* Links inside the dropup */
                                    .dropup-content button {
                                        color: #094c73;
                                        padding: 3px;
                                        text-decoration: none;
                                        display: inline-block;

                                        border-radius: 5px;
                                        width: 80px;
                                    }

                                    /* Change color of dropup links on hover */
                                    .dropup-content button:hover {
                                        background-color: #ddd
                                    }

                                    /* Show the dropup menu on hover */
                                    .dropup:hover .dropup-content {
                                        display: block;
                                    }

                                    /* Change the background color of the dropup button when the dropup content is shown */
                                    .dropup:hover .dropbtn {
                                        background-color: #2980B9;
                                    }
                                </style>


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
