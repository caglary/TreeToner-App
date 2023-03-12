@extends('layouts.app')
@section('content')
    <div class="row justify-content-left">
        <div class="col-md-6">
            <div class="card bg-light mb-3" style="max-width: 30rem;">
                <div class="card-header">Müşteri Bilgisi</div>
                <div class="card-body">

                    <strong> Kurum Adı: </strong>{{ $musteri->kurum_adi }} <br>
                    <strong>İsim Soysim: </strong>{{ $musteri->adi_soyadi }} <br>
                    <strong>Cep Telefonu: </strong>{{ $musteri->telefon_1 }} <br>
                    <strong>İş Telefonu: </strong>{{ $musteri->telefon_2 }} <br>
                    <strong>Adres:</strong> {{ $musteri->adres }}
                </div>
            </div>

        </div>
        @if (isset($siparisler))
            <div class="col-sm-6">
                <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Toplam Sipariş Tutar</div>
                    <div class="card-body">
                        @php
                            $toplam = 0;
                            foreach ($siparisler as $siparis) {
                                $toplam += $siparis->fiyat;
                            }
                            echo "<p class='card-text'>" . $toplam . ' TL</p>';

                        @endphp
                    </div>
                </div>
            </div>
        @endif
    </div>
    <hr>
    @if (isset($siparisler))
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>yazici_model</th>
                        <th>yazici_seri_no</th>
                        <th>ariza</th>
                        <th>fiyat</th>
                        <th>İşlemler</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($siparisler as $siparis)
                        <tr>

                            <td>{{ $siparis->yazici_model }}</td>
                            <td>{{ $siparis->yazici_seri_no }}</td>

                            <td>{{ $siparis->ariza }}</td>

                            <td>{{ $siparis->fiyat }}</td>
                            <td>

                                <form method="POST"
                                    action="{{ route('siparis.sil', ['siparis_id' => $siparis->id, 'musteri_id' => $siparis->musteri_id]) }}">
                                    <a href="/siparis_show/{{ $siparis->id }}" class="btn btn-outline-info btn-sm">Göster</a>
                                    <a href="{{ route('siparis_show', ['siparis_id' => $siparis->id, 'musteri_id' => $siparis->musteri_id]) }}"
                                        class="btn btn-sm btn-squre btn-outline-success" title="Show">Güncelle</a>

                                    @csrf
                                    <button class="btn btn-sm btn-squre btn-outline-danger" type="submit"
                                        onclick="return confirm('Kaydı silmek istediğinizden emin misiniz? Evet-(OK) Hayır-(Cancel)')">
                                        sil</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>
        @else
            <div class="alert alert-info" role="alert">
                Herhangi bir sipiriş bulunmamaktadır. Sipariş eklemek için --Sipariş Ekle-- butonuna
                basınız.

            </div>
    @endif
    <div>
        <a href="{{ route('siparis_create', ['musteri_id' => $musteri_id]) }}" class="btn btn-warning">Sipariş Ekle</a>

        <a class="btn btn-secondary" href="{{ route('musteriler') }}" role="button">Geri</a>
    </div>

    <hr>
@endsection
