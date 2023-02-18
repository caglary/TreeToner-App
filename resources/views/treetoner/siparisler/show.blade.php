@extends('layouts.app')
@section('content')
    <div class="center">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="container" style="margin: auto">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-title">
                        <strong>Sipariş Detay</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <form class="row g-4" method="POST"
                                        action="{{ route('siparis_update', ['musteri_id' => $musteri_id, 'siparis_id' => $siparis_id]) }}">
                                        @csrf
                                        <div class="col-md-5">
                                            <label class="form-label">Yacıcı Model</label>
                                            <input type="text" class="form-control" name="yazici_model"
                                                value="{{ $siparis->yazici_model }}">
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label">Yazıcı Seri No</label>
                                            <input type="text" class="form-control" name="yazici_seri_no"
                                                value="{{ $siparis->yazici_seri_no }}">
                                        </div>
                                        <fieldset>
                                            <div class="row g-3 col-md-12">

                                                <div class="col-md-5">
                                                    <label class="form-label">Arıza</label>
                                                    <textarea class="form-control" name="ariza" rows="3">{{ $siparis->ariza }}</textarea>
                                                </div>
                                                <div class="col-md-5">
                                                    <label class="form-label">Açıklama</label>
                                                    <textarea class="form-control" name="aciklama" rows="3">{{ $siparis->aciklama }}</textarea>
                                                </div>
                                                <div class="col-md-10">
                                                    <label class="form-label">Sonuç</label>
                                                    <textarea class="form-control" name="sonuc" rows="3">{{ $siparis->sonuc }}</textarea>
                                                </div>
                                                <div>
                                                    <div class="container " style="margin: 5%">
                                                        <div class="col">
                                                            @if ($siparis->usb_kablo == 'var')
                                                                <input class="form-check-input" name="usb_kablo"
                                                                    type="checkbox" checked>
                                                                <label class="form-check-label" for="gridCheck">Usb Kablo
                                                                    Var</label>
                                                            @else
                                                                <input class="form-check-input" name="usb_kablo"
                                                                    type="checkbox">
                                                                <label class="form-check-label" for="gridCheck">Usb Kablo
                                                                    Var</label>
                                                            @endif

                                                        </div>
                                                        <div class="col">
                                                            @if ($siparis->power_kablo == 'var')
                                                                <input class="form-check-input" name="power_kablo"
                                                                    type="checkbox" checked>
                                                                <label class="form-check-label" for="gridCheck">Power Kablo
                                                                    Var</label>
                                                            @else
                                                                <input class="form-check-input" name="power_kablo"
                                                                    type="checkbox">
                                                                <label class="form-check-label" for="gridCheck">Power Kablo
                                                                    Var</label>
                                                            @endif


                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </fieldset>
                                        <div class="input-group col-md-3" style="margin: 5px">
                                            <span class="input-group-text">Fiyat</span>
                                            <input type="text" name="fiyat" class="form-control"
                                                value="{{ $siparis->fiyat }}" required>

                                        </div>
                                        <div><input type="hidden" name="musteri_id" value={{ $musteri_id }}></div>
                                        <div class="col-12" style="margin: 5px">
                                            <button class="btn btn-primary" type="submit">Güncelle</button>

                                            <a class="btn btn-secondary"
                                                href="{{ route('siparis.index', ['musteri_id' => $musteri_id]) }}"
                                                role="button">Geri</a>

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
