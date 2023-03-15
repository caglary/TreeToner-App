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
                            <th>İsim</th>
                            <th>Yazıcı Model</th>
                            <th>ariza</th>
                            <th>fiyat</th>
                            <th>Ödeme Durumu</th>
                            

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($siparisler as $siparis)
                            <tr>

                                <td>{{ $siparis->adi_soyadi }}</td>
                                <td>{{ $siparis->yazici_model }}</td>

                                <td>{{ $siparis->ariza }}</td>

                                <td>{{ $siparis->fiyat }}</td>
                                <td style="text-align: center">
                                    <form method="POST"action="/tahsilatlar/siparis/card/{{ $siparis->id }}/money_paid">
                                        @csrf
                                        <button style="margin: 2%;width:100%;" class="btn btn-sm btn-squre btn-warning" type="submit"
                                            onclick="return confirm('Ödemesi Yapıldı mı? Evet-(OK) Hayır-(Cancel)')">
                                            Kart</button>
                                    </form>
                               
                                    <form method="POST"action="/tahsilatlar/siparis/nakit/{{ $siparis->id }}/money_paid">
                                        @csrf
                                        <button style="margin: 2%;width:100%;" class="btn btn-sm btn-squre btn-success" type="submit"
                                            onclick="return confirm('Ödemesi Yapıldı mı? Evet-(OK) Hayır-(Cancel)')">
                                            Nakit</button>
                                    </form>
                              
                                    <form method="POST"action="/tahsilatlar/siparis/eft/{{ $siparis->id }}/money_paid">
                                        @csrf
                                        <button style="margin: 2%;width:100%;" class="btn btn-sm btn-squre btn-info" type="submit"
                                            onclick="return confirm('Ödemesi Yapıldı mı? Evet-(OK) Hayır-(Cancel)')">
                                            EFT</button>
                                    </form>
                               
                                    <form method="POST"action="/tahsilatlar/siparis/money_return/{{ $siparis->id }}/money_return">
                                        @csrf
                                        <button style="margin: 2%;width:100%;" class="btn btn-sm btn-squre btn-danger" type="submit"
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

    @endsection