@extends('layouts.app')
@section('content')
    <div class="card-body">
        {{-- <span>Edit Form for {{ Auth::user()->name }}</span>
        <a href="/users"> <-back</a> --}}
        <div class="container">
            {{-- <h1>Kullanıcı Bilgileri Güncelle</h1>
              <hr> --}}
            <div class="row">
                <!-- left column -->
                {{-- <div class="col-md-3">
                <div class="text-center">
                  <img src="/img/treetonerlogosmall.png" class="avatar img-circle" alt="avatar">
                  <h6>Upload a different photo...</h6>
                  
                  <input type="file" class="form-control">
                </div>
              </div> --}}

                <!-- edit form column -->
                <div class="col-md-9 personal-info">
                    {{-- <div class="alert alert-info alert-dismissable">
                  <a class="panel-close close" data-dismiss="alert">×</a> 
                  <i class="fa fa-coffee"></i>
                  This is an <strong>.alert</strong>. Use this to show important messages to the user.
                </div> --}}
                    @php
                        
                        $user = DB::table('users')
                            ->where('id', auth::user()->id)
                            ->first();
                    @endphp
                    <h3>Kullanıcı Bilgileri</h3>
                    @include('common.alert')

                    <form action="/users/{{ $user->id }}" method="post" class="form-horizontal" role="form">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="id" name="id" value="{{ auth::user()->id }}">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Kullanıcı Adı:</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="name" type="text" value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">E-mail:</label>
                            <div class="col-lg-8">
                                <input class="form-control" name="email" type="email" value="{{ $user->email }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Yeni Parola:</label>
                            <div class="col-md-8">
                                <input class="form-control" type="password" name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Yeni Parola Tekrar:</label>
                            <div class="col-md-8">
                                <input class="form-control" type="password" name="confirm_password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">

                                <input type="submit" class="btn btn-success btn-sm" value="Kaydet">
                                <span></span>
                                <a href="/users" class="btn btn-sm btn-squre btn-outline-info" title="iptal"><i
                                        class="fa fa-edit">Geri</i></a>

                            </div>
                        </div>
                    </form>
                    <div class="center">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
@endsection
