@extends('layouts.app')
@section('content')
@include('common.alert')
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Kullanıcı Adı</th>
                    <th>İsim Soyisim</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th>{{$user->name}}</th>
                        <th>{{$user->email}}</th>
                        <td width="250">
                            <a href="/users/{{$user->id}}/edit" class="btn btn-sm btn-squre btn-outline-info"
                                title="Show"><i class="fa fa">Güncelle</i></a>
                            <a href=""
                                class="btn btn-sm btn-squre btn-outline-danger" title="Show"><i
                                    class="fa fa-edit">...</i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
