@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-title">
                        <strong>Müşteri Kayıt İşlemi</strong>
                    </div>
                    @include('common.alert')
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{ route('musteri.ekle') }}">
                                    @csrf
                                    <div>
                                        <label for="exampleFormControlInput1" class="form-label">Kurum Adı</label>
                                        <input type="text" name="kurum_adi" class="form-control" value="{{old('kurum_adi')}}">
                                    </div>&nbsp;
                                    <div>
                                        <label for="exampleFormControlInput1" class="form-label">Adı Soyadı</label>
                                        <input type="text" name="adi_soyadi" class="form-control" value="{{old('adi_soyadi')}}">
                                    </div>&nbsp;
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="telefon_1">Cep Telefonu</span>
                                        <input type="text" name="telefon_1" class="form-control" aria-label="telefon"
                                            aria-describedby="basic-addon1" value="{{old('telefon_1')}}">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="telefon_2">İş</span>
                                        <input type="text" name="telefon_2" class="form-control" aria-label="telefon"
                                            aria-describedby="basic-addon1" value="{{old('telefon_2')}}">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="mail">E-mail</span>
                                        <input type="mail" name="mail" class="form-control" aria-label="mail"
                                            aria-describedby="basic-addon1" value="{{old('mail')}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Adres</label>
                                        <textarea class="form-control" name="adres" rows="3" >{{old('adres')}}</textarea>
                                    </div>

                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-success">Ekle</button>
                                        <a class="btn btn-secondary" href="{{ route('musteriler') }}"
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
