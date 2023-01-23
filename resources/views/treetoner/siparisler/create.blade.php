@extends('treetoner.public')
@section('content')
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
<div class="container center">
<form class="row g-3" method="POST" action="{{route('siparis_kaydet',['musteri_id'=>$musteri_id])}}">
    @csrf
    <div class="col-md-5">
      <label class="form-label">Yacıcı Model</label>
      <input type="text" class="form-control" name="yazici_model">
    </div>
    <div class="col-md-5">
      <label  class="form-label">Yazıcı Seri No</label>
      <input type="text" class="form-control" name="yazici_seri_no">
    </div>
    <div class="row g-3">
       
            <div class="col-md-4">
                <label class="form-label">Arıza</label>
                <textarea class="form-control" name="ariza" rows="3"></textarea>
            </div>
            <div class="col-md-4">
                <label class="form-label">Açıklama</label>
                <textarea class="form-control" name="aciklama" rows="3"></textarea>
            </div>
            <div class="col-md-4">
                <label class="form-label">Sonuç</label>
                <textarea class="form-control" name="sonuc" rows="3"></textarea>
            </div>  
            <div class="container g-3">
                <div class="col">
                    <input class="form-check-input" name="usb_kablo" type="checkbox" >
                    <label class="form-check-label" for="gridCheck">Usb Kablo Var</label>
                    
                </div>
                <div class="col">
                    <input class="form-check-input" name="power_kablo" type="checkbox" >
                    <label class="form-check-label" for="gridCheck">Power Kablo Var</label>
                    
                </div>
            </div>
            
    </div>
    <div class="input-group col-md-3">
        <span class="input-group-text">Fiyat</span>
        <input type="text" name="fiyat" class="form-control" >       
       
    </div>
    <div><input type="hidden" name="musteri_id" value={{$musteri_id}} ></div>
    <div class="col-12">
        <button class="btn btn-primary" type="submit">Kaydet</button>

        <a class="btn btn-secondary" href="{{route('siparis_index',[$musteri_id])}}" role="button">Geri</a>

    </div>
    
  </form>
</div>
  @endsection