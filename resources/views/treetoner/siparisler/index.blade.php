@extends('layouts.app')
@section('content')
    <main class="py-5">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-title">
                            <strong>Siparişler</strong>
                        </div>
                        @if (isset($siparisler))
                            <table class="table">
                                <thead>
                                    <tr>

                                        <th scope="col">yazici_model</th>
                                        <th scope="col">yazici_seri_no</th>

                                        <th scope="col">ariza</th>

                                        <th scope="col">fiyat</th>

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

                                                <a href="{{ route('siparis_show', ['siparis_id' => $siparis->id, 'musteri_id' => $siparis->musteri_id]) }}"
                                                    class="btn btn-sm btn-squre btn-outline-info" title="Show"><i
                                                        class="fa fa-edit">Güncelle</i></a>
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

                        <div   style="padding: 2%">
                            <a href="{{ route('siparis_create', ['musteri_id' => $musteri_id]) }}"
                                class="btn btn-warning">Sipariş Ekle</a>

                            <a class="btn btn-secondary" href="{{ route('musteriler') }}" role="button">Geri</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
       
    </main>
@endsection
