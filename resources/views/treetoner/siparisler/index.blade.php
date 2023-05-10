@extends('layouts.app')
@include('common.icons')
@section('content')
    @include('common.alert')

    <div class="row justify-content-left">
        <div class="col-md-6">
            <div class="card bg-light mb-3" style="max-width: 30rem;">
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
        @if (isset($siparisler))
            <div class="col-sm-6">
                <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Müşteriye Ait Toplam Sipariş Tutarı</div>
                    <div class="card-body">
                        @php
                            $toplam = 0;
                            foreach ($siparisler as $siparis) {
                                if ($siparis->tahsilat == 'money_return') {
                                    continue;
                                }
                                $toplam += $siparis->fiyat;
                            }
                            echo "<p class='card-text' style='text-align: center;'>" . $toplam . ' TL</p>';
                            
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
                        <td></td>
                        <td>Tarih</td>
                        <th>Model</th>
                        <th>Seri No</th>
                        <th>Arıza</th>
                        <th>Fiyat</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($siparisler as $siparis)
                        <tr>

                            @if ($siparis->tahsilat == 'money_return')
                                <td style="background-color: rgb(89, 62, 4);color:rgb(238, 75, 75);">
                                    <h6>İade</h6>
                                </td>
                            @else
                                @if ($siparis->tahsilat == 'money_paid')
                                    <td style="background-color: rgb(74, 99, 74);color:rgb(236, 231, 231);">
                                        <h6>{{icon_select('odendi')}} Ödendi</h6>
                                    </td>
                                @elseif($siparis->tahsilat == 'money_wait')
                                    <td style="background-color: rgb(158, 158, 118);color:rgb(230, 242, 11);">
                                        <h6>{{icon_select('odenecek')}} Ödenecek</h6>
                                    </td>
                                @endif
                            @endif
                            <td>{{date('d/m/Y',strtotime($siparis->created_at))}}</td>
                            <td>{{ $siparis->yazici_model }}</td>
                            <td>{{ $siparis->yazici_seri_no }}</td>

                            <td>{{ $siparis->ariza }}</td>

                            <td>{{ $siparis->fiyat }}</td>
                            <td>
                                <form method="POST"
                                    action="{{ route('siparis.sil', ['siparis_id' => $siparis->id, 'musteri_id' => $siparis->musteri_id]) }}">
                                    <a href="/siparis_show/{{ $siparis->id }}"
                                        class="btn btn-outline-info btn-sm">{{icon_select('goster')}} Göster</a>
                                {{-- kasa defterine işli kayıtlarda güncelleme ve silme işlemi yapılamıyor. --}}

                                    @if ($siparis->tahsilat != 'money_paid')
                                        <a href="{{ route('siparis_show', ['siparis_id' => $siparis->id, 'musteri_id' => $siparis->musteri_id]) }}"
                                            class="btn btn-sm btn-squre btn-outline-success" title="Show">{{icon_select('guncelle')}} Güncelle</a>

                                        @csrf
                                        <button class="btn btn-sm btn-squre btn-outline-danger" type="submit"
                                            onclick="return confirm('Kaydı silmek istediğinizden emin misiniz? Evet-(OK) Hayır-(Cancel)')">
                                            {{icon_select('sil')}} sil</button>
                                    @endif

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
        <a href="{{ route('siparis_create', ['musteri_id' => $musteri_id]) }}" class="btn btn-warning">{{icon_select('ekle')}} Sipariş Ekle</a>

        <a class="btn btn-secondary" href="{{ route('musteriler') }}" role="button">{{icon_select('geri')}} Geri</a>
    </div>

    <hr>
@endsection
