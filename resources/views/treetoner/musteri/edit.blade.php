@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-title">
                        <strong>Müşteri Güncelleme İşlemi</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{ route('musteri_update', $musteri->id) }}">
                                    @csrf
                                    <div>
                                        <label for="exampleFormControlInput1" class="form-label">Kurum Adı</label>
                                        <input type="text" name="kurum_adi" class="form-control" id="kurumadi"
                                            value="{{ $musteri->kurum_adi }}">
                                    </div>&nbsp;
                                    <div>
                                        <label for="exampleFormControlInput1" class="form-label">Adı Soyadı</label>
                                        <input type="text" name="adi_soyadi" class="form-control" id="adisoyadi"
                                            value="{{ $musteri->adi_soyadi }}">
                                    </div>&nbsp;
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="telefon_1">Telefon</span>
                                        <input type="text" name="telefon_1" class="form-control"
                                            value="{{ $musteri->telefon_1 }}" aria-label="Username"
                                            aria-describedby="basic-addon1">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="telefon_2">Telefon 2</span>
                                        <input type="text" name="telefon_2" class="form-control"
                                            value="{{ $musteri->telefon_2 }}" aria-label="Username"
                                            aria-describedby="basic-addon1">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="mail">E-mail</span>
                                        <input type="mail" name="mail" class="form-control"
                                            value="{{ $musteri->mail }}" aria-label="Username"
                                            aria-describedby="basic-addon1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Adres</label>
                                        <textarea class="form-control" name="adres" id="adres" rows="3">{{ $musteri->adres }}</textarea>
                                    </div>

                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-success">Bilgileri Güncelle</button>
                                        <a class="btn btn-secondary" href="{{ route('musteri_show', $musteri['id']) }}"
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
@endsection
