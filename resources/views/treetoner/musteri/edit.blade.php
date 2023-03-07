@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-title">
                        <strong>Müşteri Güncelleme İşlemi</strong>
                    </div>
                    @include('common.alert')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{ route('musteri.guncelle', $musteri->id) }}">
                                    @csrf
                                    <div>
                                        <label for="exampleFormControlInput1" class="form-label">Kurum Adı</label>
                                        <input type="text" name="kurum_adi" class="form-control"
                                            value="{{ $musteri->kurum_adi }}">
                                    </div>&nbsp;
                                    <div>
                                        <label for="exampleFormControlInput1" class="form-label">İsim Soyisim</label>
                                        <input type="text" name="adi_soyadi" class="form-control"
                                            value="{{ $musteri->adi_soyadi}}">
                                    </div>&nbsp;
                                    <div>
                                        <label for="exampleFormControlInput1" class="form-label">Cep Telefonu</label>
                                        <input type="tel" name="cep_telefonu" class="form-control" aria-label="telefon"
                                            aria-describedby="basic-addon1" value="{{ $musteri->telefon_1 }}"
                                            oninput="phoneFormat(this)">
                                    </div>&nbsp;
                                    <div>
                                        <label for="exampleFormControlInput1" class="form-label">İş Telefonu</label>
                                        <input type="tel" name="is_telefonu" class="form-control" aria-label="telefon"
                                            aria-describedby="basic-addon1" value="{{ $musteri->telefon_2 }}" oninput="phoneFormat(this)">
                                    </div>&nbsp;
                                    <div>
                                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                                        <input type="mail" name="mail" class="form-control" aria-label="mail"
                                            aria-describedby="basic-addon1" value="{{ $musteri->mail }}">
                                    </div>&nbsp;
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Adres</label>
                                        <textarea class="form-control" name="adres" rows="3">{{ $musteri->adres  }}</textarea>
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
    @include('common.telefon_format')
@endsection
