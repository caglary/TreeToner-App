@extends('layouts.app')
@section('content')
    <div class="container">
        <nav class="nav" style="padding: 10px">
            <div style="position: relative">
                <a href="{{ route('musteri_add_get') }}" class="btn btn-warning" style="font-size: small">musteri ekle</a>
            </div>
            <div  style=" position:absolute;right: 10%;">
                <form class="d-flex" role="search" action="{{ route('musteri_search') }}" method="post">
                    @csrf
                    <input class="form-control me-2" type="search" name="search" placeholder="Müşteri ismi giriniz..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit" style="font-size: small">Ara</button>
                </form>
            </div>



        </nav>
       

        <div class="row justify-content-center" style="padding: 10px">


            <table class="table">
                <thead>
                    <tr >
                        <th scope="col">Kurum Adı</th>
                        <th scope="col">Adı Soyadı</th>
                        <th scope="col">Telefon-1</th>
                        <th scope="col">Telefon-2</th>



                    </tr>
                </thead>
                <tbody style="padding: 10px">

                    @foreach ($musteries as $musteri)
                        @csrf
                        <tr>

                            <td>{{ $musteri->kurum_adi }}</td>
                            <td>{{ $musteri->adi_soyadi }}</td>
                            <td>{{ $musteri->telefon_1 }}</td>
                            <td>{{ $musteri->telefon_2 }}</td>


                            <td width="250">
                                <a href="{{ route('musteri_show', $musteri->id) }}"
                                    class="btn btn-sm btn-squre btn-outline-info" title="Show"><i
                                        class="fa fa">düzelt</i></a>
                                <a href="{{ route('siparis_index', ['musteri_id' => $musteri->id]) }}"
                                    class="btn btn-sm btn-squre btn-outline-danger" title="Show"><i
                                        class="fa fa-edit">siparişler</i></a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection
