@extends('layouts.app')
@section('content')
@include('common.alert')
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
                                <a href="/users/{{$user->id}}/edit" class="btn btn-sm btn-squre btn-outline-info"
                                    title="Show"><i class="fa fa">Güncelle</i></a>
                                    <input type="submit"  class="btn btn-sm btn-squre btn-outline-danger" onclick="return confirm('Kullanıcıyı silmek istediğinizden Emin misiniz?')" value="Sil">
                                    
                                </form>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
