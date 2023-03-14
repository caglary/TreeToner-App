@extends('layouts.app')
@section('content')
   
    <div class="row justify-content-left">

        <div class="col-md-6">
            <div class="card bg-light mb-3" style="max-width: 30rem;">
                <div class="card-header">Alacak Defteri</div>
            </div>
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

                                    <form method="POST"action="/tahsilatlar/money_paid/{{ $siparis->id }}">
                                        @csrf
                                        <button class="btn btn-sm btn-squre btn-success" type="submit"
                                            onclick="return confirm('Ödemesi Yapıldı mı? Evet-(OK) Hayır-(Cancel)')">
                                            Ödendi</button>
                                    </form>
                                    <form method="POST"action="/tahsilatlar/money_return/{{ $siparis->id }}">
                                        @csrf
                                        <button class="btn btn-sm btn-squre btn-danger" type="submit"
                                            onclick="return confirm('İade mi edildi? Evet-(OK) Hayır-(Cancel)')">
                                            İade</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>
            @else
                <div class="alert alert-info" role="alert">
                    Ödemesi yapılmayan herhangi bir sipiriş bulunmamaktadır.

                </div>
        @endif
        {{-- <div>
            <a href="{{ route('siparis_create', ['musteri_id' => $musteri_id]) }}" class="btn btn-warning">Sipariş Ekle</a>

            <a class="btn btn-secondary" href="{{ route('musteriler') }}" role="button">Geri</a>
        </div>

        <hr> --}}
    @endsection
