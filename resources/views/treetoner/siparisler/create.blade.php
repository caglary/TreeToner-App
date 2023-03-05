@extends('layouts.app')
@section('content')
    @include('common.alert')
    <div class="container" style="margin: auto">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-title">
                        <strong>Sipariş Oluştur</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <form class="row g-4" method="POST"
                                        action="{{ route('siparis_kaydet', ['musteri_id' => $musteri_id]) }}">
                                        @csrf
                                        <div class="col-md-5">
                                            <label class="form-label">Yacıcı Model</label>
                                            <input type="text" class="form-control" name="yazici_model">
                                        </div>
                                        <div class="col-md-5">
                                            <label class="form-label">Yazıcı Seri No</label>
                                            <input type="text" class="form-control" name="yazici_seri_no">
                                        </div>
                                        <div class="row g-3 col-md-12">

                                            <div class="col-md-5">
                                                <label class="form-label">Arıza</label>
                                                <textarea class="form-control" name="ariza" rows="3"></textarea>
                                            </div>
                                            <div class="col-md-5">
                                                <label class="form-label">Açıklama</label>
                                                <textarea class="form-control" name="aciklama" rows="3"></textarea>
                                            </div>
                                            <div class="col-md-10">
                                                <label class="form-label">Sonuç</label>
                                                <textarea class="form-control" name="sonuc" rows="3"></textarea>
                                            </div>
                                            
                                                <fieldset>
                                                    <div class="container " style="margin: 5%">
                                                        <div class="container g-3">
                                                            <div class="col">
                                                                <input class="form-check-input" name="usb_kablo"
                                                                    type="checkbox">
                                                                <label class="form-check-label" for="gridCheck">Usb Kablo
                                                                    Var</label>

                                                            </div>
                                                            <div class="col">
                                                                <input class="form-check-input" name="power_kablo"
                                                                    type="checkbox">
                                                                <label class="form-check-label" for="gridCheck">Power Kablo
                                                                    Var</label>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            


                                        </div>
                                        <div class="input-group col-md-3" style="margin: 5px">
                                            <span class="input-group-text">Fiyat</span>
                                            <input type="text" name="fiyat" class="form-control" >

                                        </div>
                                        <div><input type="hidden" name="musteri_id" value={{ $musteri_id }}></div>
                                        <div class="col-12">
                                            <button class="btn btn-primary" type="submit">Kaydet</button>

                                            <a class="btn btn-secondary" href="{{ route('siparis.index', [$musteri_id]) }}"
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
