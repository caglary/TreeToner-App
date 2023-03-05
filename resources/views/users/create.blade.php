@extends('layouts.app')
@section('content')
    @include('common.alert')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-title">
                        <strong>Yeni Kullanıcı Bilgileri</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action='/users' method="post" class="form-horizontal" role="form">
                                    @csrf


                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Kullanıcı Adı:</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" name="name" type="text" required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">E-mail:</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" name="email" type="email" required">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Parola:</label>
                                        <div class="col-md-8">
                                            <input class="form-control" type="password" name="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Parola Tekrar:</label>
                                        <div class="col-md-8">
                                            <input class="form-control" type="password" name="confirm_password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"></label>
                                        <div class="col-md-8">

                                            <input type="submit" class="btn btn-success btn-sm" value="Kaydet">
                                            <span></span>
                                            <a href="/users" class="btn btn-sm btn-squre btn-outline-info"
                                                title="iptal"><i class="fa fa-edit">Geri</i></a>

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
