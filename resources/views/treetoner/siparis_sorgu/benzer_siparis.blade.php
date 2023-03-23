@extends('layouts.app')
@include('common.icons')
@section('content')
    <div class="container" style="margin: auto">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{icon_select('musteri-bilgi')}} Müşteri Bilgisi</div>
                    <div class="card-body">
    
                        <strong> Kurum Adı: </strong>{{ $musteri->kurum_adi }} <br>
                        <strong>İsim Soysim: </strong>{{ $musteri->adi_soyadi }} <br>
                        <strong>Cep Telefonu: </strong>{{ $musteri->telefon_1 }} <br>
                        <strong>İş Telefonu: </strong>{{ $musteri->telefon_2 }} <br>
                        <strong>Adres:</strong> {{ $musteri->adres }}
                    </div>
                </div>
    
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-title">
                        <strong>{{ icon_select('siparis-olustur') }} Sipariş </strong>
                    </div>
                    <div class="card-body">
                        @include('common.alert')

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <form class="row g-4" method="POST"
                                        action="{{ route('siparis_kaydet', ['musteri_id' => $siparis->musteri_id]) }}">
                                        @csrf
                                        <div class="col-md-5">
                                            <label class="form-label">Yacıcı Model</label>
                                            <input type="text" class="form-control" name="yazici_model"
                                                value="{{ $siparis->yazici_model }}">
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label">Yazıcı Seri No</label>
                                            <input type="text" class="form-control" name="yazici_seri_no"
                                                value="{{$siparis->yazici_seri_no}}">
                                        </div>
                                        <div class="row g-3 col-md-12">

                                            <div class="col-md-5">
                                                <label class="form-label">Arıza</label>
                                                <textarea class="form-control" name="ariza" rows="3">{{ $siparis->ariza}}</textarea>
                                            </div>
                                            <div class="col-md-5">
                                                <label class="form-label">Açıklama</label>
                                                <textarea class="form-control" name="aciklama" rows="3">{{ $siparis->aciklama }}</textarea>
                                            </div>
                                            <div class="col-md-10">
                                                <label class="form-label">Sonuç</label>
                                                <textarea class="form-control" name="sonuc" rows="3">{{ $siparis->sonuc }}</textarea>
                                            </div>

                                            <fieldset>
                                                <div class="container " style="margin: 5%">
                                                    <div class="container g-3">
                                                        <div class="col">
                                                            <input class="form-check-input" name="usb_kablo" type="checkbox"
                                                                value="1"
                                                                @if ($siparis->usb_kablo == 'var') checked @endif>
                                                            <label class="form-check-label" for="gridCheck">Usb Kablo
                                                                Var</label>

                                                        </div>
                                                        <div class="col">
                                                            <input class="form-check-input" name="power_kablo"
                                                                type="checkbox" value="1"
                                                                @if ($siparis->power =='var') checked @endif>
                                                            <label class="form-check-label" for="gridCheck">Power Kablo
                                                                Var</label>

                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>



                                        </div>
                                        <div class="input-group col-md-3" style="margin: 5px">
                                            <span class="input-group-text">Fiyat</span>
                                            <input type="number" name="fiyat" Step=".01" class="form-control"
                                                value="{{ $siparis->fiyat }}">

                                        </div>
                                        
                                        <div class="col-12">
                                            <button class="btn btn-success" type="submit">{{ icon_select('kaydet') }}
                                            Müşteriye Yeni Sipariş Ekle</button>

                                            <a class="btn btn-secondary" href="/siparis_sorgu/index"
                                                role="button">{{ icon_select('geri') }} Geri</a>

                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
