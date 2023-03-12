@extends('layouts.app')
@section('content')
    @include('common.alert')
    <div class="container" style="margin: auto">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header card-title">
                        <strong>Sipariş Detay</strong>
                    </div>
                    @include('common.alert')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="first_name" class="col-md-3 col-form-label">Yazıcı Model</label>
                                    <div class="col-md-9">
                                        <p class="form-control-plaintext text-muted">{{ $siparis['yazici_model'] }}</p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="last_name" class="col-md-3 col-form-label">Yazıcı Seri No</label>
                                    <div class="col-md-9">
                                        <p class="form-control-plaintext text-muted">{{ $siparis['yazici_seri_no'] }}</p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-3 col-form-label">Usb Kablosu</label>
                                    <div class="col-md-9">
                                        <p class="form-control-plaintext text-muted">{{ $siparis['usb_kablo'] }}</p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone" class="col-md-3 col-form-label">Power Kablosu</label>
                                    <div class="col-md-9">
                                        <p class="form-control-plaintext text-muted">{{ $siparis['power_kablo'] }}</p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-3 col-form-label">Arıza</label>
                                    <div class="col-md-9">
                                        <p class="form-control-plaintext text-muted">{{ $siparis['ariza'] }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="company_id" class="col-md-3 col-form-label">Açıklama</label>
                                    <div class="col-md-9">
                                        <p class="form-control-plaintext text-muted">{{ $siparis['aciklama'] }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="company_id" class="col-md-3 col-form-label">Sonuç</label>
                                    <div class="col-md-9">
                                        <p class="form-control-plaintext text-muted">{{ $siparis['sonuc'] }}</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="company_id" class="col-md-3 col-form-label">Fiyat</label>
                                    <div class="col-md-9">
                                        <p class="form-control-plaintext text-muted">{{ $siparis['fiyat'] }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <div class="col-md-4">

                                        <a href="{{ route('siparis_show', ['siparis_id' => $siparis->id, 'musteri_id' => $siparis->musteri_id]) }}"
                                            class="btn btn-sm btn-squre btn-primary" title="Show">Güncelle</a>
                                        <a class="btn btn-secondary btn-sm"
                                        href="{{ route('siparis.index', ['musteri_id' => $siparis['musteri_id']]) }}"
                                        role="button">Geri</a>
                                  
                                      
                                    </div>
                                   

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div>
                </div>
            </div>
        </div>
    </div>
@endsection
