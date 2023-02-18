@extends('layouts.app')
@section('content')
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

                                    <a href="{{ route('siparis_show', ['siparis_id' => $siparis->id, 'musteri_id' => $siparis->musteri_id]) }}"
                                        class="btn btn-sm btn-squre btn-outline-info" title="Show"><i
                                            class="fa fa-edit">Güncelle</i></a>

                                            @csrf
                                            <button class="btn btn-sm btn-squre btn-outline-danger"  type="submit">
                                    sil</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
                {{--  <tfoot>
                    <tr>
                        <th>yazici_model</th>
                        <th>yazici_seri_no</th>
                        <th>ariza</th>
                        <th>fiyat</th>
                        <th>İşlemler</th>


                    </tr>
                </tfoot> --}}
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
