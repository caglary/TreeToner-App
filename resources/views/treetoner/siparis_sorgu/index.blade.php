@extends('layouts.app')
@include('common.icons')

@section('content')
    @include('common.alert')

  

    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header card-title" style="text-align: center">
                    <strong>{{ icon_select('shopping') }} Sipariş Sorgu İşlemleri</strong>

                </div>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body" style="padding: 2%">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tarih</th>
                    <th>Yazıcı Model</th>
                    <th>Yazıcı Seri No</th>
                    <th>Arıza</th>
                    
                    
                    <th></th>


                </tr>
            </thead>
            <tbody>

                @foreach ($siparisler as $siparis)
                    @csrf
                    <tr>
                        <td>{{$siparis->created_at->format('d/m/Y')}}</td>
                        <td>{{ $siparis->yazici_model }}</td>
                        <td>{{ $siparis->yazici_seri_no }}</td>
                        
                        <td>{{ $siparis->sonuc }}</td>



                        <td>
                           
                            <a class="btn btn-warning btn-sm "  href="/siparis_detay_pdf/{{$siparis->id}}" target="_blank" role="button">pdf</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
