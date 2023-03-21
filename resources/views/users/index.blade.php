@extends('layouts.app')
@include('common.icons')
@section('content')
@include('common.alert')
<div class="row justify-content-center">
    <div class="col-md-3">
        <div class="card">
            <div class="card-header card-title" style="text-align: center">
                <strong >{{ icon_select('users') }} Kullanıcı İşlemleri</strong>
            </div>
        </div>
    </div>
</div>
<nav class="navbar bg-body-tertiary">
    <form class="container-fluid justify-content-start" action="/users/create">
        @csrf
        <button class="btn btn-outline-success me-2" type="submit">Yeni Kullanıcı Ekle</button>

    </form>
</nav>
<div class="card-body" style="padding: 2%">
    <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Kullanıcı Adı</th>
                    <th>E-mail</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th>{{$user->name}}</th>
                        <th>{{$user->email}}</th>
                        <td width="250">
                      
                                <form action="/users/{{$user->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="/users/{{$user->id}}/edit" class="btn btn-sm btn-success"
                                    title="Show">{{ icon_select('guncelle') }} Güncelle</a>
                                    <input type="submit"  class="btn btn-sm  btn-danger" onclick="return confirm('Kaydı silmek istediğinizden emin misiniz? Evet-(OK) Hayır-(Cancel)')" value="Sil">
                                    
                                </form>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
