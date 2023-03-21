@extends('layouts.app')
@include('common.icons')
@section('content')
    @include('common.alert')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-title">
                        <strong>{{ icon_select('bilgi') }} Kullanıcı Bilgileri Güncelleme</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="/users/{{ $user->id }}" method="post" class="form-horizontal"
                                    role="form">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" id="id" name="id" value="{{ $user->id }}">
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Kullanıcı Adı:</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" name="name" type="text"
                                                value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">E-mail:</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" name="email" type="email"
                                                value="{{ $user->email }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Yeni Parola:</label>
                                        <div class="col-md-8">
                                            <input class="form-control" type="password" name="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-8 control-label">Yeni Parola Tekrar:</label>
                                        <div class="col-md-8">
                                            <input class="form-control" type="password" name="confirm_password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"></label>
                                        <div class="col-md-8">

                                            <input type="submit" class="btn btn-success btn-sm" value="Kaydet">
                                            <span></span>
                                            <a href="/users" class="btn btn-sm  btn-secondary"
                                                title="iptal">{{ icon_select('geri') }} Geri</a>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
