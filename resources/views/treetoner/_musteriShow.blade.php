@extends('treetoner.public')
@section('content')
  <main class="py-5">

    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-title">
              <strong>Müşteri Detay</strong>
            </div>           
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <label for="first_name" class="col-md-3 col-form-label">Kurum Adı</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{ $musteri['kurum_adi']}}</p>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="last_name" class="col-md-3 col-form-label">Adı Soyadı</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{$musteri['adi_soyadi']}}</p>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="email" class="col-md-3 col-form-label">Telefon-1</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{$musteri['telefon_1']}}</p>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="phone" class="col-md-3 col-form-label">Telefon-2</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{$musteri['telefon_2']}}</p>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label">E-mail</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{$musteri['mail']}}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="company_id" class="col-md-3 col-form-label">Adres</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{$musteri['adres']}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="form-group row mb-0">
                    <div class="col-md-9 offset-md-3">
                        <a href="{{ route('musteri_edit',$musteri['id'])}}" class="btn btn-info">Düzlet</a>
                        <a href="{{ route('musteri_sil',$musteri['id'])}}" class="btn btn-danger">Sil</a>
                        <a href="{{ route('musteriler')}}" class="btn btn-secondary">Geri</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection

