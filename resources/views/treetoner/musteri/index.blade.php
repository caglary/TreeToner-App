@extends('layouts.app')
@section('content')
@include('common.alert')


    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header card-title" style="text-align: center">
                    <strong>Müşteri İşlemleri</strong>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar bg-body-tertiary">
        <form class="container-fluid justify-content-start" action="{{ route('musteri.ekle.page') }}">
            @csrf
            <button class="btn btn-outline-success me-2" type="submit">Yeni Müşteri Ekle</button>

        </form>
    </nav>


    <!-- /.card-header -->
    <div class="card-body" style="padding: 2%">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Kurum Adı</th>
                    <th>Müşteri ismi</th>
                    <th>Cep Telefonu</th>
                    <th>İş Telefonu</th>
                    <th>İşlemler</th>


                </tr>
            </thead>
            <tbody>

                @foreach ($musteries as $musteri)
                    @csrf
                    <tr>

                        <td>{{ $musteri->kurum_adi }}</td>
                        <td>{{ $musteri->adi_soyadi }}</td>
                        <td>{{ $musteri->telefon_1 }}</td>
                        <td>{{ $musteri->telefon_2 }}</td>


                        <td width="250">
                            <a href="{{ route('musteri_show', $musteri->id) }}"
                                class="btn btn-sm btn-squre btn-outline-success" title="Show">Müşteri Detay</a>
                            <a href="{{ route('siparis.index', ['musteri_id' => $musteri->id]) }}"
                                class="btn btn-sm btn-outline-danger" title="Show">Siparişler</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection
